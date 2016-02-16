@extends('layouts.master')

@section('content')
    <!-- Byte list -->
    <div class="container content">

    @include('layouts.partials.error_list')
    {!! Form::open(['url' => 'bytes', 'files' => 'true']) !!}

    <!-- Name Input -->
    <div class='form-group'>
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <!-- Story Input -->
    <div class='form-group'>
        {!! Form::label('story', 'Story:') !!}
        {!! Form::textarea('story', null, ['class' => 'form-control']) !!}
    </div>

    <div class="row form-group">
        <!-- Image File -->
        <div class="col-md-4">
            {!! Form::label('image', 'Image:') !!}
            {!! Form::file('image', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('use_image_time', 'Use Image Timestamp:') !!}<br>
            {!! Form::checkbox('use_image_time', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-4">
            {!! Form::label('rating', 'Rating:') !!}
            {!! Form::select('rating', array(
                0 => 'Unrated',
                1 => 'Hated it',
                2 => 'Didn&lsquo;t like it',
                3 => 'Liked it',
                4 => 'Really liked it',
                5 => 'Loved it'), null, ['class' => 'form-control'])
            !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('place_id', 'Place:') !!}
            @if($placeList)
                {!! Form::select('place_id', $placeList, null, ['class' => 'form-control']) !!}
            @else
                {!! Form::text('place_id', null, ['class' => 'form-control']) !!}
            @endif
        </div>
        <div class="col-md-4">
            {!! Form::label('zone_id', 'Time Zone:') !!}
            @if($zones)
                {!! Form::select('zone_id', $zones, 90, ['class' => 'form-control']) !!}
            @else
                {!! Form::text('zone_id', null, ['class' => 'form-control']) !!}
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
                4 => 'Goal'), null, ['class' => 'form-control'])
            !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('privacy', 'Privacy:') !!}
            {!! Form::select('privacy', array(
                0 => 'Myself only',
                1 => 'My Friends',
                2 => 'The World'), null, ['class' => 'form-control'])
            !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('time_perspective', 'Time Perspective:') !!}
            {!! Form::select('time_perspective', array(
            0 => 'On',
            1 => 'Around',
            2 => 'Before',
            3 => 'After',
            4 => 'By'), null, ['class' => 'form-control'])
            !!}
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-2">
            {!! Form::label('year', 'Year:') !!}
            {!! Form::text('year', $date->format('Y'), ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-2">
            {!! Form::label('month', 'Month:') !!}
            {!! Form::text('month', $date->format('n'), ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-2">
            {!! Form::label('day', 'Day:') !!}
            {!! Form::text('day', $date->format('j'), ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-2">
            {!! Form::label('hour', 'Hour:') !!}
            {!! Form::text('hour', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-2">
            {!! Form::label('minute', 'Minute:') !!}
            {!! Form::text('minute', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-2">
            {!! Form::label('second', 'Seconds:') !!}
            {!! Form::text('second', null, ['class' => 'form-control']) !!}
        </div>
    </div>
<div class="row form-group">
    <div class="col-md-6">
        {!! Form::label('lines', 'Lifelines:') !!}
        {!! Form::select('lines[]', $lines, null, ['class' => 'form-control', 'multiple']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('people', 'People:') !!}
        {!! Form::select('people[]', $people, null, ['class' => 'form-control', 'multiple']) !!}
    </div>
</div>

<!-- Create Lifebyte Submit Button -->
    <div class='form-group'>
        {!! Form::submit('Create Lifebyte', ['class' => 'btn-u']) !!}
        {!! link_to(URL::previous(), 'Cancel', ['class' => 'btn-u btn-u-default']) !!}
    </div>

    {!! Form::close() !!}

</div>
<!-- End Add Form -->

@stop