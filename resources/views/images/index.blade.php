@extends('layouts.master')

@section('headcontent', '<link rel="stylesheet" href="assets/css/pages/page_search_inner.css">')

@section('content')

    <!--=== Found Images ===-->
    <div class="s-results margin-bottom-50">
        <span class="results-number">{{ $count }} Images</span>

        @include('images.partials.list_images')

        <div class="margin-bottom-30"></div>

    </div><!--/container-->
    <!--=== End Found Images ===-->

@stop