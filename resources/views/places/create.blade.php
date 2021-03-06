@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12 md-margin-bottom-40">
            <div class="headline"><h2>{{ $title }}</h2>
            </div>
        </div>
    </div>

    @include('layouts.partials.error_list')
    {!! Form::open(['url' => 'places']) !!}

    <div class='form-group'>
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('address', 'Address:') !!}
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            {!! Form::label('city', 'City:') !!}
            {!! Form::text('city', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('province', 'Province:') !!}
            {!! Form::text('province', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('country_code', 'Country:') !!}
            {!! Form::select('country_code', $countries, 'CA', ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-6">
            {!! Form::label('url_place', 'Place URL:') !!}
            {!! Form::text('url_place', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('url_wikipedia', 'Wikipedia URL:') !!}
            {!! Form::text('url_wikipedia', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            {!! Form::label('lat', 'Latitude:') !!}
            {!! Form::text('lat', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('lng', 'Longitude:') !!}
            {!! Form::text('lng', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('zoom', 'Map Zoom Level:') !!}
            {!! Form::text('zoom', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            {!! Form::label('image_id', 'Image ID:') !!}
            {!! Form::text('image_id', null, ['class' => 'form-control']) !!}
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

    <!-- Create Place Submit Button -->
    <div class='form-group'>
        {!! Form::submit('Add Place', ['class' => 'btn-u']) !!}
        {!! link_to(URL::previous(), 'Cancel', ['class' => 'btn-u btn-u-default']) !!}
    </div>

    {!! Form::close() !!}
@stop