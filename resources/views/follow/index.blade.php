@extends('layouts.master')

@section('title', 'Byters List - Lifecanvas')

@section('headcontent')
    <link rel="stylesheet" href="assets/css/pages/page_search_inner.css">
    <link rel="stylesheet" href="assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css">
    <link rel="stylesheet" href="assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css">
@stop



@section('content')
    <div class="container content"><!--=== Start Content ===-->
        <div class="row">
            <div class="col-md-3 md-margin-bottom-40">
                <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
                    <li class="list-group-item">
                        <a href="page_profile_settings.html"><i class="fa fa-globe"></i> All</a>
                    </li>
                    <li class="list-group-item active">
                        <a href="page_profile_users.html"><i class="fa fa-group"></i> People</a>
                    </li>
                    <li class="list-group-item">
                        <a href="page_profile_projects.html"><i class="fa fa-safari"></i> Places</a>
                    </li>
                    <li class="list-group-item">
                        <a href="page_profile_comments.html"><i class="fa fa-paper-plane"></i> Things</a>
                    </li>
                </ul>

            </div>

            <div class="col-md-9 md-margin-bottom-40">
                <!--=== Found Results ===-->
                <div class="s-results margin-bottom-50">
                    <div class="row">
                        <div class="headline"><h2>People</h2><div class="results-number pull-right">{{ $count }} People Found</div></div>

                    </div>
                    <div class="row team-v6">

                        @forelse($followable as $byter)
                            @include('follow.partials.followable')
                        @empty
                            <h4>No Byters available.</h4>
                        @endforelse

                        <div class="margin-bottom-30"></div>
                    </div>
                </div><!--/container-->
                <!--=== End Found Byters ===-->
            </div>
        </div>
    </div><!--=== End Content ===-->
@stop