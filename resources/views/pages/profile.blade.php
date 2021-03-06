@extends('layouts.master')

@section('headcontent')
    <link rel="stylesheet" href="assets/css/pages/profile.css">
@stop

@section('content')
        <!--=== Profile ===-->
        <div class="row profile">
            <!--Left Sidebar-->
            <div class="col-md-3 md-margin-bottom-40">
                <img class="img-responsive profile-img margin-bottom-20" src="assets/img/team/img32-md.jpg" alt="">

                <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
                    <li class="list-group-item">
                        <a href="page_profile.html"><i class="fa fa-bar-chart-o"></i> Overall</a>
                    </li>
                    <li class="list-group-item">
                        <a href="page_profile_me.html"><i class="fa fa-user"></i> Profile</a>
                    </li>
                    <li class="list-group-item">
                        <a href="page_profile_users.html"><i class="fa fa-group"></i> Users</a>
                    </li>
                    <li class="list-group-item">
                        <a href="page_profile_projects.html"><i class="fa fa-cubes"></i> My Projects</a>
                    </li>
                    <li class="list-group-item">
                        <a href="page_profile_comments.html"><i class="fa fa-comments"></i> Comments</a>
                    </li>
                    <li class="list-group-item">
                        <a href="page_profile_history.html"><i class="fa fa-history"></i> History</a>
                    </li>
                    <li class="list-group-item active">
                        <a href="page_profile_settings.html"><i class="fa fa-cog"></i> Settings</a>
                    </li>
                </ul>

                <div class="panel-heading-v2 overflow-h">
                    <h2 class="heading-xs pull-left"><i class="fa fa-bar-chart-o"></i> Task Progress</h2>
                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                </div>
                <h3 class="heading-xs">Web Design <span class="pull-right">92%</span></h3>
                <div class="progress progress-u progress-xxs">
                    <div style="width: 92%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">
                    </div>
                </div>
                <h3 class="heading-xs">Unify Project <span class="pull-right">85%</span></h3>
                <div class="progress progress-u progress-xxs">
                    <div style="width: 85%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="85" role="progressbar" class="progress-bar progress-bar-blue">
                    </div>
                </div>
                <h3 class="heading-xs">Sony Corporation <span class="pull-right">64%</span></h3>
                <div class="progress progress-u progress-xxs margin-bottom-40">
                    <div style="width: 64%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="64" role="progressbar" class="progress-bar progress-bar-dark">
                    </div>
                </div>

                <hr>

                <!--Notification-->
                <div class="panel-heading-v2 overflow-h">
                    <h2 class="heading-xs pull-left"><i class="fa fa-bell-o"></i> Notification</h2>
                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                </div>
                <ul class="list-unstyled mCustomScrollbar margin-bottom-20" data-mcs-theme="minimal-dark">
                    <li class="notification">
                        <i class="icon-custom icon-sm rounded-x icon-bg-red icon-line icon-envelope"></i>
                        <div class="overflow-h">
                            <span><strong>Albert Heller</strong> has sent you email.</span>
                            <small>Two minutes ago</small>
                        </div>
                    </li>
                    <li class="notification">
                        <img class="rounded-x" src="assets/img/testimonials/img6.jpg" alt="">
                        <div class="overflow-h">
                            <span><strong>Taylor Lee</strong> started following you.</span>
                            <small>Today 18:25 pm</small>
                        </div>
                    </li>
                    <li class="notification">
                        <i class="icon-custom icon-sm rounded-x icon-bg-yellow icon-line fa fa-bolt"></i>
                        <div class="overflow-h">
                            <span><strong>Natasha Kolnikova</strong> accepted your invitation.</span>
                            <small>Yesterday 1:07 pm</small>
                        </div>
                    </li>
                    <li class="notification">
                        <img class="rounded-x" src="assets/img/testimonials/img1.jpg" alt="">
                        <div class="overflow-h">
                            <span><strong>Mikel Andrews</strong> commented on your Timeline.</span>
                            <small>23/12 11:01 am</small>
                        </div>
                    </li>
                    <li class="notification">
                        <i class="icon-custom icon-sm rounded-x icon-bg-blue icon-line fa fa-comments"></i>
                        <div class="overflow-h">
                            <span><strong>Bruno Js.</strong> added you to group chating.</span>
                            <small>Yesterday 1:07 pm</small>
                        </div>
                    </li>
                    <li class="notification">
                        <img class="rounded-x" src="assets/img/testimonials/img6.jpg" alt="">
                        <div class="overflow-h">
                            <span><strong>Taylor Lee</strong> changed profile picture.</span>
                            <small>23/12 15:15 pm</small>
                        </div>
                    </li>
                </ul>
                <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
                <!--End Notification-->

                <div class="margin-bottom-50"></div>

                <!--Datepicker-->
                <form action="#" id="sky-form2" class="sky-form">
                    <div id="inline-start"></div>
                </form>
                <!--End Datepicker-->
            </div>
            <!--End Left Sidebar-->

            <!-- Profile Content -->
            <div class="col-md-9">
                <div class="profile-body margin-bottom-20">
                    <div class="tab-v1">
                        <ul class="nav nav-justified nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#profile">Edit Profile</a></li>
                            <li><a data-toggle="tab" href="#passwordTab">Change Password</a></li>
                            <li><a data-toggle="tab" href="#payment">Payment Options</a></li>
                            <li><a data-toggle="tab" href="#settings">Notification Settings</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="profile" class="profile-edit tab-pane fade in active">
                                <h2 class="heading-md">Manage your Name, ID and Email Addresses.</h2>
                                <p>Below are the name and email addresses on file for your account.</p>
                                <br>
                                <dl class="dl-horizontal">
                                    <dt><strong>Your name </strong></dt>
                                    <dd>
                                        Edward Rooster
                                        <span>
                                            <a class="pull-right" href="#">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </span>
                                    </dd>
                                    <hr>
                                    <dt><strong>Your ID </strong></dt>
                                    <dd>
                                        FKJ-032440
                                        <span>
                                            <a class="pull-right" href="#">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </span>
                                    </dd>
                                    <hr>
                                    <dt><strong>Company name </strong></dt>
                                    <dd>
                                        Htmlstream
                                        <span>
                                            <a class="pull-right" href="#">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </span>
                                    </dd>
                                    <hr>
                                    <dt><strong>Primary Email Address </strong></dt>
                                    <dd>
                                        edward-rooster@gmail.com
                                        <span>
                                            <a class="pull-right" href="#">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </span>
                                    </dd>
                                    <hr>
                                    <dt><strong>Phone Number </strong></dt>
                                    <dd>
                                        (304) 33-2867-499
                                        <span>
                                            <a class="pull-right" href="#">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </span>
                                    </dd>
                                    <hr>
                                    <dt><strong>Office Number </strong></dt>
                                    <dd>
                                        (304) 44-9810-296
                                        <span>
                                            <a class="pull-right" href="#">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </span>
                                    </dd>
                                    <hr>
                                    <dt><strong>Address </strong></dt>
                                    <dd>
                                        California, US
                                        <span>
                                            <a class="pull-right" href="#">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </span>
                                    </dd>
                                    <hr>
                                </dl>
                                <button type="button" class="btn-u btn-u-default">Cancel</button>
                                <button type="button" class="btn-u">Save Changes</button>
                            </div>

                            <div id="passwordTab" class="profile-edit tab-pane fade">
                                <h2 class="heading-md">Manage your Security Settings</h2>
                                <p>Change your password.</p>
                                <br>
                                <form class="sky-form" id="sky-form4" action="#">
                                    <dl class="dl-horizontal">
                                        <dt>Username</dt>
                                        <dd>
                                            <section>
                                                <label class="input">
                                                    <i class="icon-append fa fa-user"></i>
                                                    <input type="text" placeholder="Username" name="username">
                                                    <b class="tooltip tooltip-bottom-right">Needed to enter the website</b>
                                                </label>
                                            </section>
                                        </dd>
                                        <dt>Email address</dt>
                                        <dd>
                                            <section>
                                                <label class="input">
                                                    <i class="icon-append fa fa-envelope"></i>
                                                    <input type="email" placeholder="Email address" name="email">
                                                    <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
                                                </label>
                                            </section>
                                        </dd>
                                        <dt>Enter your password</dt>
                                        <dd>
                                            <section>
                                                <label class="input">
                                                    <i class="icon-append fa fa-lock"></i>
                                                    <input type="password" id="password" name="password" placeholder="Password">
                                                    <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                                </label>
                                            </section>
                                        </dd>
                                        <dt>Confirm Password</dt>
                                        <dd>
                                            <section>
                                                <label class="input">
                                                    <i class="icon-append fa fa-lock"></i>
                                                    <input type="password" name="passwordConfirm" placeholder="Confirm password">
                                                    <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                                </label>
                                            </section>
                                        </dd>
                                    </dl>
                                    <label class="toggle toggle-change"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Remember password</label>
                                    <br>
                                    <section>
                                        <label class="checkbox"><input type="checkbox" id="terms" name="terms"><i></i><a href="#">I agree with the Terms and Conditions</a></label>
                                    </section>
                                    <button type="button" class="btn-u btn-u-default">Cancel</button>
                                    <button class="btn-u" type="submit">Save Changes</button>
                                </form>
                            </div>

                            <div id="payment" class="profile-edit tab-pane fade">
                                <h2 class="heading-md">Manage your Payment Settings</h2>
                                <p>Below are the payment options for your account.</p>
                                <br>
                                <form class="sky-form" id="sky-form" action="#">
                                    <!--Checkout-Form-->
                                    <section>
                                        <div class="inline-group">
                                            <label class="radio"><input type="radio" checked="" name="radio-inline"><i class="rounded-x"></i>Visa</label>
                                            <label class="radio"><input type="radio" name="radio-inline"><i class="rounded-x"></i>MasterCard</label>
                                            <label class="radio"><input type="radio" name="radio-inline"><i class="rounded-x"></i>PayPal</label>
                                        </div>
                                    </section>

                                    <section>
                                        <label class="input">
                                            <input type="text" name="name" placeholder="Name on card">
                                        </label>
                                    </section>

                                    <div class="row">
                                        <section class="col col-10">
                                            <label class="input">
                                                <input type="text" name="card" id="card" placeholder="Card number">
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="input">
                                                <input type="text" name="cvv" id="cvv" placeholder="CVV2">
                                            </label>
                                        </section>
                                    </div>

                                    <div class="row">
                                        <label class="label col col-4">Expiration date</label>
                                        <section class="col col-5">
                                            <label class="select">
                                                <select name="month">
                                                    <option disabled="" selected="" value="0">Month</option>
                                                    <option value="1">January</option>
                                                    <option value="1">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-3">
                                            <label class="input">
                                                <input type="text" placeholder="Year" id="year" name="year">
                                            </label>
                                        </section>
                                    </div>
                                    <button type="button" class="btn-u btn-u-default">Cancel</button>
                                    <button class="btn-u" type="submit">Save Changes</button>
                                    <!--End Checkout-Form-->
                                </form>
                            </div>

                            <div id="settings" class="profile-edit tab-pane fade">
                                <h2 class="heading-md">Manage your Notifications.</h2>
                                <p>Below are the notifications you may manage.</p>
                                <br>
                                <form class="sky-form" id="sky-form3" action="#">
                                    <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Email notification</label>
                                    <hr>
                                    <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Send me email notification when a user comments on my blog</label>
                                    <hr>
                                    <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Send me email notification for the latest update</label>
                                    <hr>
                                    <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Send me email notification when a user sends me message</label>
                                    <hr>
                                    <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Receive our monthly newsletter</label>
                                    <hr>
                                    <button type="button" class="btn-u btn-u-default">Reset</button>
                                    <button class="btn-u" type="submit">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Content -->
        </div><!--/end row-->
    <!--=== End Profile ===-->
@stop