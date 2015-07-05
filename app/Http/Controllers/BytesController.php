<?php namespace App\Http\Controllers;

use App\Byte;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ByteRequest;
use App\Lifecanvas\FuzzyDate;
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

        $title = 'Lifebyte List';
        $description = 'Lifecanvas, take a byte our of life';

        $bytes = \Auth::user()->bytes()->latest('byte_date')->past()->with('place')->get();
        $count = $bytes->count();

        return view('bytes.index', compact('bytes','title','description','count'));
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

        return view('bytes.create', compact('title', 'placeList', 'zones', 'date'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ByteRequest $request)
	{

        $fuzzy_date = new FuzzyDate();

        $byte_date = $fuzzy_date->makeByteDate(
            $request->year,
            $request->month,
            $request->day,
            $request->hour,
            $request->minute,
            $request->seconds
        );

        $timeZone = \App\Zone::where('id', '=', $request->zone_id)->first();

        $timestamp = Carbon::createFromFormat('Y-m-d H:i:s',
                    $byte_date["datetime"], $timeZone->zone_name);

        //dd($timestamp);

        $input = array_add($request->all(), 'user_id', Auth::id());

        $input["image_id"] = $input["image_id"] == "" ? null : $input["image_id"];
        $input["rating"] = $input["rating"] == "" ? null : $input["rating"];
        $input["place_id"] = $input["place_id"] == 0 ? null : $input["place_id"];
        $input["story"] = strlen($input["story"]) < 1 ? null : $input["story"];

        $input = array_add($input, 'byte_date', $timestamp->setTimezone('UTC'));

        $input = array_add($input, 'accuracy', $byte_date["accuracy"]);

        Byte::create($input);

        return redirect('bytes');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $byte = Byte::findOrFail($id);

        $title = "$byte->name";

        return view('bytes.show', compact('byte','title'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

        $byte = Byte::findOrFail($id);

        $title = "Edit: $byte->name";

        $fuzzy_date = new FuzzyDate();

        $timeZone = \App\Zone::where('id', '=', $byte->zone_id)->first();

        $timestamp = Carbon::createFromFormat('Y-m-d H:i:s',
            $byte->byte_date, 'UTC');

        $formDate = $fuzzy_date->makeFormValues($timestamp->setTimezone($timeZone->zone_name), $byte->accuracy);

        $placeList = array('0' => 'Select a place for the byte');

        $places = \App\Place::orderBy('name')->lists('name', 'id')->toArray();

        $placeList = $placeList + $places;

        $zones = \App\Zone::orderBy('zone_name')->lists('zone_name', 'id')->toArray();

        return view('bytes.edit', compact('byte','title', 'formDate', 'zones', 'placeList'));
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

        $fuzzy_date = new FuzzyDate();

        $byte_date = $fuzzy_date->makeByteDate(
            $request->year,
            $request->month,
            $request->day,
            $request->hour,
            $request->minute,
            $request->seconds
        );

        $input["image_id"] = $input["image_id"] == "" ? null : $input["image_id"];
        $input["rating"] = $input["rating"] == "" ? null : $input["rating"];
        $input["place_id"] = $input["place_id"] == 0 ? null : $input["place_id"];
        $input["story"] = strlen($input["story"]) < 1 ? null : $input["story"];

        $timeZone = \App\Zone::where('id', '=', $request->zone_id)->first();

        $timestamp = Carbon::createFromFormat('Y-m-d H:i:s',
            $byte_date["datetime"], $timeZone->zone_name);

        $input = array_add($input, 'byte_date', $timestamp->setTimezone('UTC'));

        $input = array_add($input, 'accuracy', $byte_date["accuracy"]);

        //dd($input);

        $byte->update($input);

        return view('bytes.show', compact('byte','title'));
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

}
