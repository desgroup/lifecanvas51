<?php namespace App\Http\Controllers;

use App\Byte;
use App\Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ByteRequest;
use App\Lifecanvas\FuzzyDate;
use App\Lifecanvas\Utilities;
use Auth;
use Carbon\Carbon;

/**
 * Class BytesController
 * @package App\Http\Controllers
 */
class BytesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $title = 'Lifebyte List: All';
        $description = 'Lifecanvas, take a byte our of life';

        $bytes = \Auth::user()->bytes()->latest('byte_date')->past()->with('place', 'image')->get();
        $count = $bytes->count();

        $lines = \Auth::user()->lines()->orderBy('name')->get();

        $line_selected = "";

        return view('bytes.index', compact('bytes','title','description','count','lines', 'line_selected'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        $title = 'Add a Lifebyte';

        $date = Carbon::now('America/Toronto');

        $placeList = array('0' => 'Select a place for the byte');

        $places = \App\Place::orderBy('name')->lists('name', 'id')->toArray();

        $placeList = $placeList + $places;

        $zones = \App\Zone::orderBy('zone_name')->lists('zone_name', 'id')->toArray();

        $lines = \App\Line::orderBy('name')->lists('name', 'id')->toArray();

        $people = \App\People::orderBy('name')->lists('name', 'id')->toArray();

        return view('bytes.create', compact('title', 'placeList', 'zones', 'lines', 'people', 'date'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ByteRequest $request) {

        //dd($request->lines);

        $input = array_add($request->all(), 'user_id', Auth::id());

        if($request->hasFile('image')){

            $image_data = $this->processImage($request);
            $byte_date = $this->createTimestamp($request, $image_data['byte_date']);

        } else {

            $byte_date = $this->createTimestamp($request);

        }

        $input["image_id"] = !isset($image_data['id']) ? null : $image_data['id'];

        $input = array_add($input, 'byte_date', $byte_date['datetime']->setTimezone('UTC'));
        $input = array_add($input, 'accuracy', $byte_date["accuracy"]);

        $input["rating"] = $input["rating"] == 0 ? null : $input["rating"];
        $input["place_id"] = $input["place_id"] == 0 ? null : $input["place_id"];
        $input["story"] = strlen($input["story"]) < 1 ? null : $input["story"];

        $byte = Byte::create($input);

        $byte->lines()->attach($request->lines);

        $byte->people()->attach($request->people);

        return redirect("bytes/$byte->id");

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $byte = Byte::with('lines', 'place', 'image')->FindOrFail($id);

        $title = $byte->name;

        if(is_null($byte->image_id)) {

            $image = null;

        } else {

            $image = Image::FindOrFail($byte->image_id);

        }

        return view('bytes.show', compact('title', 'byte', 'image'));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

        $byte = Byte::with('lines')->findOrFail($id);

        $title = "Edit: $byte->name";

        $fuzzy_date = new FuzzyDate();

        if($byte->accuracy == "0000000") {

            $formDate = $fuzzy_date->makeFormValues(null, "0000000");

        } else {

            $timeZone = \App\Zone::where('id', '=', $byte->zone_id)->first();

            $timestamp = Carbon::createFromFormat('Y-m-d H:i:s',
                $byte->byte_date, 'UTC');

            $formDate = $fuzzy_date->makeFormValues($timestamp->setTimezone($timeZone->zone_name), $byte->accuracy);


        }

        $placeList = array('0' => 'Select a place for the byte');

        $places = \App\Place::orderBy('name')->lists('name', 'id')->toArray();

        $placeList = $placeList + $places;

        $zones = \App\Zone::orderBy('zone_name')->lists('zone_name', 'id')->toArray();

        $lines = \App\Line::orderBy('name')->lists('name', 'id')->toArray();

        $people = \App\People::orderBy('name')->lists('name', 'id')->toArray();

        return view('bytes.edit', compact('byte','title', 'formDate', 'zones', 'lines', 'people', 'placeList'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, ByteRequest $request)
	{
        $byte = Byte::findOrFail($id);

        $input = array_add($request->all(), 'user_id', Auth::id());

        $title = $input["name"];

        //Fine up to here

        if($request->hasFile('image')){

            $image_data = $this->processImage($request);
            $byte_date = $this->createTimestamp($request, $image_data['byte_date']);
            $input["image_id"] = !isset($image_data['id']) ? null : $image_data['id'];

        } else {

            $byte_date = $this->createTimestamp($request);
            $input["image_id"] = $input["image_id"] == "" ? null : $input["image_id"];

        }

        $input = array_add($input, 'byte_date', $byte_date['datetime']->setTimezone('UTC'));
        $input = array_add($input, 'accuracy', $byte_date["accuracy"]);

        $input["rating"] = $input["rating"] == 0 ? null : $input["rating"];
        $input["place_id"] = $input["place_id"] == 0 ? null : $input["place_id"];
        $input["story"] = strlen($input["story"]) < 1 ? null : $input["story"];

        $byte->update($input);

        if (!is_null($request->lines)) {

            $byte->lines()->sync($request->lines);

        }

        if(!is_null($request->people)) {

           $byte->people()->sync($request->people);

        }


        return redirect("bytes/$id");

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return "delete " . $id;
	}

    private function getGps($exifCoord, $hemi) {

        $degrees = count($exifCoord) > 0 ? $this->gps2Num($exifCoord[0]) : 0;
        $minutes = count($exifCoord) > 1 ? $this->gps2Num($exifCoord[1]) : 0;
        $seconds = count($exifCoord) > 2 ? $this->gps2Num($exifCoord[2]) : 0;

        $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1;

        return $flip * ($degrees + $minutes / 60 + $seconds / 3600);

    }

    private function gps2Num($coordPart)
    {

        $parts = explode('/', $coordPart);

        if (count($parts) <= 0) {
            return 0;
        }

        if (count($parts) == 1) {
            return $parts[0];
        }

        return floatval($parts[0]) / floatval($parts[1]);
    }

    private function processImage($request) {

        $file = $request->file('image');

        $info = new \SplFileInfo($file->getClientOriginalName());
        $extension = strtolower ($info->getExtension());
        $filename = uniqid(Auth::user()->id, true);
        $filename = str_replace(".","-",$filename) . "." . $extension;
        $filePath = public_path() . '/usr/'. Auth::user()->id;
        $utilities = new Utilities();
        $utilities->makePath($filePath . '/org/');
        $utilities->makePath($filePath . '/medium/');
        $utilities->makePath($filePath . '/small/');
        $utilities->makePath($filePath . '/thumb/');
        $utilities->makePath($filePath . '/org/');
        $file->move($filePath . '/org/', $filename);

        $img = \Image::make($filePath . '/org/' . $filename);
        $img_medium = \Image::make($filePath . '/org/' . $filename);
        $img_small = \Image::make($filePath . '/org/' . $filename);
        $img_thumbnail = \Image::make($filePath . '/org/' . $filename);
        $img_medium->resize(1500, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($filePath . '/medium/' . $filename, 90);
        $img_small->resize(240, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($filePath . '/small/' . $filename, 90);
        $img_thumbnail->resize(125, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($filePath . '/thumb/' . $filename, 70);

        $exif = $img->exif();

        $lat = NULL;
        $lng = NULL;

        if(array_key_exists('GPSLongitude', $exif)) {
            $lat = $this->getGps($exif['GPSLatitude'], $exif['GPSLatitudeRef']);
            $lng = $this->getGps($exif['GPSLongitude'], $exif['GPSLongitudeRef']);
        }

        $image_data = array(
            'filename'      => $filename,
            'extension'     => $extension,
            'file_type'     => 0,
            'rights'        => 0,
            'size_kb'       => $exif['FileSize']/1000,
            'height_px'     => $exif['COMPUTED']['Height'],
            'width_px'      => $exif['COMPUTED']['Width'],
            'image_date'    => $exif['DateTime'],
            'image_lat'     => $lat,
            'image_lng'     => $lng,
            'user_id'       => Auth::id()
        );

        $image = Image::create($image_data);

        if($request->use_image_time == "on" && !is_null($img->exif('DateTime'))) {

            $byte_date = array("datetime" => $img->exif('DateTime'), "accuracy" => "1111110");
            $data = array("id" => $image->id, "byte_date" => $byte_date);

        } else {

            $data = array("id" => $image->id, "byte_date" => null);

        }

        return($data);

    }

    private function createTimestamp($request, $image_date = null) {

        if(is_null($image_date)) {

            //dd('is null');

            $fuzzy_date = new FuzzyDate();

            $byte_date = $fuzzy_date->makeByteDate(
                $request->year,
                $request->month,
                $request->day,
                $request->hour,
                $request->minute,
                $request->seconds
            );

            //dd("Input: " . $byte_date['datetime']);

        } else {

            //dd('not null');

            $byte_date = array("datetime" => $image_date['datetime'],
                "accuracy" => $image_date['accuracy']);

            //dd("Image: " . $byte_date['datetime']);

        }

        $timeZone = \App\Zone::where('id', '=', $request->zone_id)->first();

        $byte_date["datetime"] = $timestamp = Carbon::createFromFormat('Y:m:d H:i:s',
            $byte_date["datetime"], $timeZone->zone_name);

        //dd($byte_date);

        return $byte_date;

    }

}
