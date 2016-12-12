@extends('layouts.master')

@section('title', "Lifebyte: {!! $title !!}")

@section('pagejs')
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&key=AIzaSyAz9PhTiJVQ8IDgFtnSd7ProYrMktmMGkA"></script>
    <script src="assets/plugins/gmap/gmap.js"></script>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12 md-margin-bottom-40">
            <div class="headline"><h2>{{ $title }}</h2>
            </div>
        </div>
    </div>

    <!--=== Found Byte ===-->
    <div class="row">util
        <div class="col-md-7">
            @if(!is_null($byte->image_id))
                <div class="byte_image">
                    <img src="/usr/{{ $byte->user_id }}/medium/{{ $image->filename }}" width="100%" class="img-responsive">
                </div>
            @endif
                <ul class="list-inline down-ul">
                    @include('layouts.partials.ranking')
                    <li>{{ $byte->byte_date->diffForHumans() }} - {{ $byte->byte_date->format('l F jS') }}</li>
                </ul>
                @if(!is_null($byte->place_id))
                <ul class="list-inline down-ul">
                    <li><a href="{!! action('PlacesController@show', [$byte->place->id]) !!}">{{$byte->place->name}}</a></li>
                </ul>
                @endif
            <p>{{ $byte->story }}</p>
            @include('lines.partials.lines_list')
            @include('people.partials.peoples_list')
            <ul class="list-inline down-ul">
                <li><a href="{!! action('BytesController@edit', [$byte->id]) !!}"><i class="fa fa-pencil"></i> Edit</a></li>
                <li><a href="{!! action('BytesController@destroy', [$byte->id]) !!}"><i class="fa fa-trash-o"></i> Delete</a></li>
            </ul>
            <ul class="list-inline down-ul">
                {!! link_to(URL::previous(), 'Back', ['class' => 'btn-u btn-u-default']) !!}
            </ul>
        </div>
        <div class="col-md-5">
            @if($byte->place_id)
                <div id="zoomedin_map" class="margin-bottom-10" style="width:100%;height:300px;"></div>
                <div id="zoomedout_map" style="width:100%;height:200px;"></div>
            @endif
        </div>
    </div>
    <!--=== End Found Byte ===-->
@stop

@if($byte->place_id)
@section('init_scripts')
    {!! $byte->present()->showMap($byte->place_id, 'zoomedin_map', 'hybrid') !!}
    {!! $byte->present()->showMap($byte->place_id, 'zoomedout_map', 'roadmap', 4) !!}
@stop
@endif