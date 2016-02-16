@extends('layouts.master')

@section('content')

    <div class="container content profile"><!--=== Start Content ===-->

        @include('layouts.partials.error_list')
        {!! Form::open(['url' => 'lines']) !!}

        <div class='form-group'>
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('icon', 'Icon:') !!}
            {!! Form::text('icon', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Create Lifeline Submit Button -->
        <div class='form-group'>
            {!! Form::submit('Add Lifeline', ['class' => 'btn-u']) !!}
            {!! link_to(URL::previous(), 'Cancel', ['class' => 'btn-u btn-u-default']) !!}
        </div>

        {!! Form::close() !!}
    </div><!-- End Content -->
@stop