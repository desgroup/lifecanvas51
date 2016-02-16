<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Input;

class FollowingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $title = 'Byters List';
        $description = 'Lifecanvas, take a byte our of life';

        $user = Auth::user();

        $followable = User::where('id', '<>', $user->id )->orderBy('name')->get();
        $count = $followable->count();

        return view('follow.index', compact('followable','title','description','count', 'user'));

    }

    public function follow($id)
    {
        return $id;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::get();
        $input['userID'] = Auth::id();

        $user = User::FindOrFail(Auth::id());

        $user->follow()->attach($input['follow_id']);

        return Redirect::back();
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

        Auth::user()->follow()->detach($id);

        return Redirect::back();

    }
}
