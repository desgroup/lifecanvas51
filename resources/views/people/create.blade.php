@extends('layouts.master')

@section('content')

    @include('layouts.partials.error_list')
    {!! Form::open(['url' => 'people']) !!}

    <div class='form-group'>
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('account_id', 'User Account:') !!}
        @if($userList)
            {!! Form::select('account_id', $userList, null, ['class' => 'form-control']) !!}
        @else
            {!! Form::text('account_id', null, ['class' => 'form-control']) !!}
        @endif
    </div>
    <div class='form-group'>
        {!! Form::label('relationship', 'Relationship:') !!}
        {!! Form::select('relationship', array(
            0 => 'unidentified',
            1 => 'parent',
            2 => 'spouse',
            3 => 'child',
            4 => 'sibling',
            5 => 'in-law',
            6 => 'friend',
            7 => 'famous person'), null, ['class' => 'form-control'])
        !!}
    </div>

    <!-- Create Person Submit Button -->
    <div class='form-group'>
        {!! Form::submit('Add Person', ['class' => 'btn-u']) !!}
        {!! link_to(URL::previous(), 'Cancel', ['class' => 'btn-u btn-u-default']) !!}
    </div>

    {!! Form::close() !!}
@stop