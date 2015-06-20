@extends('layouts.master')

@section('headcontent', '<link rel="stylesheet" href="assets/css/pages/page_search_inner.css">')

@section('content')

    <!--=== Found Bytes ===-->
    <div class="s-results margin-bottom-50">
        <span class="results-number">{{ $count }} Lifebytes</span>

        @include('bytes.partials.list_bytes')

        <div class="margin-bottom-30"></div>

    </div><!--/container-->
    <!--=== End Found Bytes ===-->

@stop