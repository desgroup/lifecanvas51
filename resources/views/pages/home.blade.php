@extends('layouts.master')


@section('headcontent')
    <link rel="stylesheet" href="assets/css/pages/profile.css">
    <link rel="stylesheet" href="assets/plugins/line-icons-pro/styles.css">
@stop

@section('pagejs')
    <script type="text/javascript" src="assets/plugins/counter/waypoints.min.js"></script>
    <script type="text/javascript" src="assets/plugins/counter/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
@stop

@section('content')

    <div class="container content profile"><!--=== Start Content ===-->
        <div class="row"><!-- Stats Bar -->

            <div class="col-md-3 md-margin-bottom-40"><!-- Profile Image -->
                <img class="img-responsive profile-img margin-bottom-20" src="/usr/{{ $user->id }}/profile/{{ $user->photo }}" alt="">
            </div><!-- End Profile Image -->

            <div class="col-md-9 md-margin-bottom-40"><!-- Stats Boxes -->
                <div class="row margin-bottom-10">
                    <!-- Follower Stats Block -->
                    <div class="col-sm-6 sm-margin-bottom-20">
                        <div class="service-block-v3 service-block-u">
                            <i class="icon-users"></i>
                            <span class="service-heading">Followers</span>
                            <span class="counter">{{ $counts['followers'] }}</span>

                            <div class="clearfix margin-bottom-10"></div>

                            <div class="row margin-bottom-20">
                                <div class="col-xs-6 service-in">
                                    <small>Following</small>
                                    <h4 class="counter">{{ $counts['following'] }}</h4>
                                </div>
                                <div class="col-xs-6 text-right service-in">
                                    <small>Last Month</small>
                                    <h4 class="counter">6,048</h4>
                                </div>
                            </div>
                            <div class="statistics">
                                <h3 class="heading-xs">Statistics in Progress Bar <span
                                            class="pull-right">67%</span></h3>

                                <div class="progress progress-u progress-xxs">
                                    <div style="width: 67%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="67"
                                         role="progressbar" class="progress-bar progress-bar-light">
                                    </div>
                                </div>
                                <small>11% less <strong>than last month</strong></small>
                            </div>
                        </div>
                    </div>
                    <!-- End Follower Stats Block -->
                    <!-- Byte Stats Block -->
                    <div class="col-sm-6">
                        <div class="service-block-v3 service-block-blue">
                            <i class="icon-notebook"></i>
                            <span class="service-heading">Total LifeBytes</span>
                            <span class="counter">{{ $counts['byteTotal'] }}</span>

                            <div class="clearfix margin-bottom-10"></div>

                            <div class="row margin-bottom-20">
                                <div class="col-xs-6 service-in">
                                    <small>This Month</small>
                                    <h4 class="counter">{{ $counts['byteMonth'] }}</h4>
                                </div>
                                <div class="col-xs-6 text-right service-in">
                                    <small>This Year</small>
                                    <h4 class="counter">{{ $counts['byteYear'] }}</h4>
                                </div>
                            </div>
                            <div class="statistics">
                                <h3 class="heading-xs">Statistics in Progress Bar <span
                                            class="pull-right">89%</span></h3>

                                <div class="progress progress-u progress-xxs">
                                    <div style="width: 89%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="89"
                                         role="progressbar" class="progress-bar progress-bar-light">
                                    </div>
                                </div>
                                <small>15% higher <strong>than last month</strong></small>
                            </div>
                        </div>
                    </div><!-- End Byte Stats Block -->
                </div><!--/end row-->
            </div><!--End Stats Boxes -->
        </div><!-- End Stats Bar -->

        <div class="row"><!-- Feed Area -->
                <div class="col-md-8 md-margin-bottom-40">
                    <!-- Byte Feed -->
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-users"></i>Byte Feed</h2>
                            <a href="/follow"><span class="pull-right">Follow Something <i class="fa fa-plus-square-o"></i></span></a>
                        </div>
                        <div class="panel-body margin-bottom-50">
                            @if($counts['following'] > 0)
                                @forelse($byteFeed as $byte)

                                    @include('bytes.partials.byte_feed')
                                @empty
                                    <h4>No public Lifebytes posted yet by the people you are following.</h4>
                                @endforelse
                            @else
                                <h4>There are no bytes in your byte feed. You are not following anyone yet.</h4>
                            @endif
                        </div>
                    </div>
                </div><!-- End Byte Feed -->
                <div class="col-md-4 md-margin-bottom-40"><!-- My Bytes -->
                    <div class="panel panel-profile no-bg">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-thumb-tack"></i>My Latest Bytes</h2>
                            <a href="/bytes/create"><span class="pull-right">Add Byte <i class="fa fa-plus-square-o"></i></span></a>
                        </div>
                        <div id="scrollbar2" class="panel-body no-padding mCustomScrollbar"
                             data-mcs-theme="minimal-dark">
                            @forelse($myBytes as $byte)
                                @include('bytes.partials.byte_my')
                            @empty
                                <h4>No Lifebytes posted yet.</h4>
                            @endforelse
                        </div>
                    </div>
                    <!--End Profile Event-->

                </div>
        </div>
    </div>
    <!--=== End Content ===-->
@stop