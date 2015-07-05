@extends('layouts.master')

@section('content')

    @include('layouts.partials.error_list')
    {!! Form::open(['method' => 'PATCH', 'action' => ['BytesController@update', $byte->id]]) !!}

    <!-- Name Input -->
    <div class='form-group'>
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', $byte["name"], ['class' => 'form-control', 'required']) !!}
    </div>

    <!-- Story Input -->
    <div class='form-group'>
        {!! Form::label('story', 'Story:') !!}
        {!! Form::textarea('story', $byte["story"], ['class' => 'form-control']) !!}
    </div>

    <div class="row form-group">
        <div class="col-md-4">
            {!! Form::label('rating', 'Rating:') !!}
            {!! Form::text('rating', $byte["rating"], ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('image_id', 'Image:') !!}
            {!! Form::text('image_id', $byte["image_id"], ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('place_id', 'Place:') !!}
            @if($placeList)
                {!! Form::select('place_id', $placeList, $byte["place_id"], ['class' => 'form-control']) !!}
            @else
                {!! Form::text('place_id', null, ['class' => 'form-control']) !!}
            @endif
        </div>
   </div>

    <div class="row form-group">
        <div class="col-md-4">
            {!! Form::label('type', 'Byte Type:') !!}
            {!! Form::select('type', array(
                0 => 'Event',
                1 => 'Achievement',
                2 => 'Thought',
                3 => 'Statistic',
                4 => 'Goal'), $byte["type"], ['class' => 'form-control'])
            !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('privacy', 'Privacy:') !!}
            {!! Form::select('privacy', array(
                0 => 'Myself only',
                1 => 'My Friends',
                2 => 'The World'), $byte["privacy"], ['class' => 'form-control'])
            !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('time_perspective', 'Time Perspective:') !!}
            {!! Form::select('time_perspective', array(
            0 => 'On',
            1 => 'Around',
            2 => 'Before',
            3 => 'After',
            4 => 'By'), $byte["time_perspective"], ['class' => 'form-control'])
            !!}
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-2">
            {!! Form::label('year', 'Year:') !!}
            {!! Form::text('year', $formDate["year"], ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-2">
            {!! Form::label('month', 'Month:') !!}
            {!! Form::text('month', $formDate["month"], ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-2">
            {!! Form::label('day', 'Day:') !!}
            {!! Form::text('day', $formDate["day"], ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-2">
            {!! Form::label('hour', 'Hour:') !!}
            {!! Form::text('hour', $formDate["hour"], ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-2">
            {!! Form::label('minute', 'Minute:') !!}
            {!! Form::text('minute', $formDate["minute"], ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-2">
            {!! Form::label('second', 'Seconds:') !!}
            {!! Form::text('second', $formDate["second"], ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-4">
            {!! Form::label('zone_id', 'Time Zone:') !!}
            {!! Form::select('zone_id', $zones, $byte["zone_id"], ['class' => 'form-control']) !!}
        </div>
    </div>

    <!-- Create Lifebyte Submit Button -->
    <div class='form-group'>
        {!! Form::submit('Save Lifebyte', ['class' => 'btn-u']) !!}
        {!! link_to(URL::previous(), 'Cancel', ['class' => 'btn-u btn-u-default']) !!}
    </div>

    {!! Form::close() !!}
@stop