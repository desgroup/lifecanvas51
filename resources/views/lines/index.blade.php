@extends('layouts.master')

@section('title', 'Lifeline List - Lifecanvas')

@section('headcontent', '<link rel="stylesheet" href="assets/css/pages/page_search_inner.css">')

@section('content')

    <!--=== Found Lines ===-->
    <div class="s-results margin-bottom-50">
        <span class="results-number">{{ $count }} Lifelines</span>

        @include('lines.partials.list_lines')

        <div class="margin-bottom-30"></div>

    </div><!--/container-->
    <!--=== End Found Lines ===-->

@stop