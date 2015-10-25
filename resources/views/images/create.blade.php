@extends('layouts.master')

@section('content')

    @include('layouts.partials.error_list')
    {!! Form::open(['url' => 'images', 'files' => 'true']) !!}

    <!-- Rating Input -->
    <div class='form-group'>
        {!! Form::label('rating', 'Rating:') !!}
        {!! Form::text('rating', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Name Input -->
    <div class='form-group'>
        {!! Form::label('caption', 'Caption:') !!}
        {!! Form::text('caption', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <!-- Story Input -->
    <div class='form-group'>
        {!! Form::label('notes', 'Notes:') !!}
        {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Image File -->
    <div class='form-group'>
        {!! Form::label('image', 'Image:') !!}
        {!! Form::file('image', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Add Images Submit Button -->
    <div class='form-group'>
        {!! Form::submit('Add Image', ['class' => 'btn-u']) !!}
        {!! link_to(URL::previous(), 'Cancel', ['class' => 'btn-u btn-u-default']) !!}
    </div>

    {!! Form::close() !!}
@stop