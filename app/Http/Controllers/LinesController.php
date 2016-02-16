<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Line;
use Auth;

class LinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $title = 'Lifeline List';
        $description = 'Lifecanvas, take a byte our of life';

        $lines = \Auth::user()->lines()->orderBy('name')->get();
        $count = $lines->count();

        return view('lines.index', compact('lines','title','description','count'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $title = 'Add a Lifeline';

        return view('lines.create', compact('title'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $input = array_add($request->all(), 'user_id', Auth::id());

        foreach ($input as $key => $value) {

            $input["$key"] = $input["$key"] == "" ? null : $input["$key"];

        }

        $line = Line::create($input);

        return redirect("lines");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

        $line_selected = Line::with('bytes')->findOrFail($id);

        $title = $line_selected->name;

        $lines = \Auth::user()->lines()->orderBy('name')->get();

        $bytes = $line_selected->bytes;

        $count = $bytes->count();

        return view('lines.show', compact('title', 'line_selected', 'bytes', 'lines', 'count'));

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
}
