<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Requests\ImageRequest;
use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $title = 'Images List';
        $description = 'Lifecanvas, take a byte our of life';

        $images = \Auth::user()->images()->latest('image_date')->get();
        $count = $images->count();

        return view('images.index', compact('images','title','description','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $title = 'Add an Image';

        $placeList = array('0' => 'Select a place for the image');

        $places = \App\Place::orderBy('name')->lists('name', 'id')->toArray();

        $placeList = $placeList + $places;

        $zones = \App\Zone::orderBy('zone_name')->lists('zone_name', 'id')->toArray();

        return view('images.create', compact('title', 'placeList', 'zones'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ImageRequest $request)
    {

        if($request->hasFile('image')){

            $file = $request->file('image');
            $input = $request->all();

            $info = new \SplFileInfo($file->getClientOriginalName());
            $extension = strtolower ($info->getExtension());
            //$filename = 'test.jpg';
            $filename = uniqid(Auth::user()->id, true);
            $filename = str_replace(".","-",$filename) . "." . $extension;
            //$filename = time() . '-' . $file->getClientOriginalName();
            $filePath = public_path() . '/usr/'. Auth::user()->id;
            $file->move($filePath . '/org/', $filename);

            $img = \Image::make($filePath . '/org/' . $filename);
            $img_small = \Image::make($filePath . '/org/' . $filename);
            $img_thumbnail = \Image::make($filePath . '/org/' . $filename);
            $img_small->resize(240, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($filePath . '/small/' . $filename, 100);
            $img_thumbnail->resize(125, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($filePath . '/thumb/' . $filename, 100);

            $exif = $img->exif();

            $lat = NULL;
            $lng = NULL;

            if(array_key_exists('GPSLongitude', $exif)) {
                $lat = $this->getGps($exif['GPSLatitude'], $exif['GPSLatitudeRef']);
                $lng = $this->getGps($exif['GPSLongitude'], $exif['GPSLongitudeRef']);
            }

            $input2 = array(
                'rating'        => $input['rating'],
                'caption'       => $input['caption'],
                'notes'         => $input['notes'],
                'filename'      => $filename,
                'extension'     => $extension,
                //'filename2'      => $trial_filname,
                'file_type'     => 0,
                'rights'        => 0,
                'size_kb'       => $exif['FileSize']/1000,
                'height_px'     => $exif['COMPUTED']['Height'],
                'width_px'      => $exif['COMPUTED']['Width'],
                'recorded_time' => $exif['DateTime'],
                'recorded_lat'  => $lat,
                'recorded_lng'  => $lng,
                'user_id'       => Auth::id()
            );

            dd($input2);

//            $this->execute(PostImageCommand::class, $input);
//
//            Flash::message('You have added an Image.');
//
//            return Redirect::back();

        }

//        // Tacks on the current user id to the form data
//        $input = array_add(Input::get(), 'user_id', Auth::id());
//
//        $this->execute(PostImageCommand::class, $input);
//
//        Flash::message('You have added an Image.');

        //dd($input);
        //return $input;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function getGps($exifCoord, $hemi) {

        $degrees = count($exifCoord) > 0 ? $this->gps2Num($exifCoord[0]) : 0;
        $minutes = count($exifCoord) > 1 ? $this->gps2Num($exifCoord[1]) : 0;
        $seconds = count($exifCoord) > 2 ? $this->gps2Num($exifCoord[2]) : 0;

        $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1;

        return $flip * ($degrees + $minutes / 60 + $seconds / 3600);

    }

    private function gps2Num($coordPart) {

        $parts = explode('/', $coordPart);

        if (count($parts) <= 0)
            return 0;

        if (count($parts) == 1)
            return $parts[0];

        return floatval($parts[0]) / floatval($parts[1]);
    }

}
