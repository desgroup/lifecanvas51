<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Place;
use App\Http\Requests\PlaceRequest;
use Auth;
use App\Http\Controllers\Controller;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $title = 'Places List';
        $description = 'Lifecanvas, take a byte our of life';

        $places = \Auth::user()->places()->orderBy('name')->get();
        $count = $places->count();

        return view('places.index', compact('places','title','description','count'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $title = 'Add a Place';

        $zones = \App\Zone::orderBy('zone_name')->lists('zone_name', 'id')->toArray();

        $countries = \App\Country::orderBy('country_name')->lists('country_name', 'country_code')->toArray();

        return view('places.create', compact('title', 'zones', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PlaceRequest $request)
    {

        $input = array_add($request->all(), 'user_id', Auth::id());

        foreach ($input as $key => $value) {

            $input["$key"] = $input["$key"] == "" ? null : $input["$key"];

        }

        //dd($input);

        $place = Place::create($input);

        return redirect("places/$place->id");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $place = Place::findOrFail($id);

        //$bytes = \App\Byte::where('place_id', $place->id);

        //dd($bytes);

        $bytes = \Auth::user()->bytes()->where('place_id', $place->id)->latest('byte_date')->past()->with('image')->get();
        //dd($bytes);

        $count = $bytes->count();

        $title = "$place->name";

        return view('places.show', compact('place','title','bytes', 'count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $place = Place::findOrFail($id);

        $title = "Edit: $place->name";

        return view('places.edit', compact('place','title'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, PlaceRequest $request)
    {
        $place = Place::findOrFail($id);

        $input = array_add($request->all(), 'user_id', Auth::id());

        $title = $input["name"];

        foreach ($input as $key => $value) {

            $input["$key"] = $input["$key"] == "" ? null : $input["$key"];

        }

        $place->update($input);

        return view('places.show', compact('place','title'));
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
}
