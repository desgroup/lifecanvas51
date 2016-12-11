@extends('layouts.master')

@section('title', 'Lifebyte List - Lifecanvas')

@section('headcontent', '<link rel="stylesheet" href="assets/css/pages/page_search_inner.css">')

@section('content')
        <!-- Byte list -->
@include('layouts.partials.title')
<div class="row">

    <div class="col-md-3 md-margin-bottom-40">
        <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
            <li class="list-group-item active">
                <a href="/bytes"><i class="fa fa-globe"></i> All Lifelines</a>
            </li>
            @foreach($lines as $line)
                @include('bytes.partials.menu_line')
            @endforeach
            <li class="list-group-item">
                <a href="/lines/create"><i class="fa fa-plus-square-o"></i> Add Lifeline</a>
            </li>
        </ul>
    </div>

    <div class="col-md-9 s-results md-margin-bottom-50"><!--=== Found Bytes ===-->

        @include('bytes.partials.list_bytes')

        <div class="margin-bottom-30"></div>

    </div><!--/container-->

</div>
</div>
<!--=== End Found Bytes ===-->

@stop