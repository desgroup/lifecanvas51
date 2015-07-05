@extends('layouts.master')

@section('headcontent')
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="/assets/plugins/gmap/gmap.js"></script>
@stop

@section('content')

    <!--=== Found Byte ===-->
    <article>
        {{ $byte->story }}


    <!--=== End Found Byte ===-->
@stop

