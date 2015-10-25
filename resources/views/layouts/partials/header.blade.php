<!--=== Header v3 ===-->
<div class="header-v3">
    <!-- Navbar -->
    <div class="navbar navbar-default mega-menu" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-bars"></span>
                </button>
                <a class="navbar-brand" href="/home">
                    <img id="logo-header" src="/lifecanvas/img/logo.png" alt="Logo">
                </a>
            </div>

            @if(Auth::check())

                @include('layouts.partials.nav_logged_in')

            @else

                @include('layouts.partials.nav_logged_out')

            @endif

        </div>
    </div>
    <!-- End Navbar -->
</div>
<!--=== End Header v3 ===-->
