@extends('layouts.master')

@section('headcontent', '<link rel="stylesheet" href="assets/css/pages/page_search_inner.css">')

@section('content')
    <div class="row">
        <div class="col-md-12 md-margin-bottom-40">
            <div class="headline"><h2>Lifebytes: {{ $line_selected->name }}</h2>

                <div class="results-number pull-right">{{ $count }} Lifebytes</div>
            </div>
        </div>
    </div>

    <div class="row"><!--=== Found Line ===-->
        <div class="col-md-3 md-margin-bottom-40">
            <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
                <li class="list-group-item">
                    <a href="/bytes"><i class="fa fa-globe"></i> All Lifelines</a>
                </li>
                @foreach($lines as $line)
                    @include('bytes.partials.menu_line2')
                @endforeach
                <li class="list-group-item">
                    <a href="/lines/create"><i class="fa fa-plus-square-o"></i> Add Lifeline</a>
                </li>
            </ul>
        </div>

        <div class="col-md-9">

            @include('bytes.partials.list_bytes')

        </div>

    </div><!--=== End Found Line ===-->

@stop
