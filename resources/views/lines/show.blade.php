@extends('layouts.master')

@section('headcontent', '<link rel="stylesheet" href="assets/css/pages/page_search_inner.css">')

@section('content')

    <!--=== Found Line ===-->
    <div class="row">
        <div class="col-md-8">
            <div class="s-results margin-bottom-50">

            @include('bytes.partials.list_bytes')

            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
    <!--=== End Found Line ===-->
@stop
