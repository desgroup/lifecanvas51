@extends('layouts.master')

@section('title', 'Byters List - Lifecanvas')

@section('headcontent', '<link rel="stylesheet" href="assets/css/pages/page_search_inner.css">')

@section('content')

    <!--=== Found Byters ===-->
    <div class="s-results margin-bottom-50">
        <span class="results-number">{{ $count }} Byters</span>

        @forelse($followable as $byter)
            <div class="inner-results">

                <p><a href="{!! action('FollowingController@show', [$byter->id]) !!}">{{$byter->name}}</a> <a href="{!! action('FollowingController@follow', [$byter->id]) !!}"><i class="fa fa-plus-square"></i> Follow</a></p>

            </div>
        @empty
            <h4>No Byters available.</h4>
        @endforelse

        <div class="margin-bottom-30"></div>

    </div><!--/container-->
    <!--=== End Found Byters ===-->

@stop