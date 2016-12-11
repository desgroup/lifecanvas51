@extends('layouts.master')

@section('pagejs')
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="assets/plugins/gmap/gmap.js"></script>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12 md-margin-bottom-40">
            <div class="headline"><h2>{{ $title }}</h2>
                <div class="results-number pull-right">{{ $count }} Lifebytes</div>
            </div>
        </div>
    </div>

    <div class="row"><!--=== Found Place ===-->
        <div class="col-md-7">
            <ul class="list-inline down-ul">
                @include('bytes.partials.list_bytes')
            </ul>
        </div>
        <div class="col-md-5">
            <div id="zoomedin_map" class="margin-bottom-10" style="width:100%;height:300px;"></div>
            <div id="zoomedout_map" style="width:100%;height:200px;"></div>
        </div>
    </div><!--=== End Found Place ===-->

@stop

@if($place->id)
@section('init_scripts')
    {!! $place->present()->showMap($place->id, 'zoomedin_map', 'hybrid') !!}
    {!! $place->present()->showMap($place->id, 'zoomedout_map', 'roadmap', 4) !!}
@stop
@endif