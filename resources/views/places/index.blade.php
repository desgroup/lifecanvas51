@extends('layouts.master')

@section('headcontent', '<link rel="stylesheet" href="assets/css/pages/page_search_inner.css">')

@section('content')

    <!--=== Found Places ===-->
    <div class="s-results margin-bottom-50">
        <span class="results-number">{{ $count }} Places</span>

        @include('places.partials.list_places')

        <div class="margin-bottom-30"></div>

    </div><!--/container-->
    <!--=== End Found Places ===-->

@stop