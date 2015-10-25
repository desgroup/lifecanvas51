@extends('layouts.master')

@section('headcontent', '<link rel="stylesheet" href="assets/css/pages/page_search_inner.css">')

@section('content')

    <!--=== Found People ===-->
    <div class="s-results margin-bottom-50">
        <span class="results-number">{{ $count }} People</span>

        @include('people.partials.list_people')

        <div class="margin-bottom-30"></div>

    </div><!--/container-->
    <!--=== End Found Places ===-->

@stop