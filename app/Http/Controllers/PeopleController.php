<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\People;
use Auth;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $title = 'People List';
        $description = 'Lifecanvas, take a byte our of life';

        $people = \Auth::user()->people()->orderBy('name')->get();
        $count = $people->count();

        return view('people.index', compact('people','title','description','count'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $title = 'Add a new Person';

        $userList = array('0' => 'Link a user account');

        $users = \App\User::orderBy('name')->lists('name', 'id')->toArray();

        $userList = $userList + $users;

        return view('people.create', compact('title', 'userList'));

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

        $input["account_id"] = $input["account_id"] == 0 ? null : $input["account_id"];

        $input["relationship"] = $input["relationship"] == 0 ? null : $input["relationship"];

        $person = People::create($input);

        return redirect("people");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

        $person = People::with('bytes')->findOrFail($id);

        $title = $person->name;

        $bytes = $person->bytes;

        return view('lines.show', compact('title', 'person', 'bytes'));

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
