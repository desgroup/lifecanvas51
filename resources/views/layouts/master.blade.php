<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" xmlns="http://www.w3.org/1999/html"> <!--<![endif]-->

@include('layouts.partials.head')

<body>

<div class="wrapper">

    @if(!isset($hidenav))
        @include('layouts.partials.header')
    @endif

    @if(Auth::check())

        @include('layouts.partials.breadcrumbs')

    @endif

    <!--=== Content Part  ===-->
    <div class="container content">

        @yield('content')

    </div><!--/container-->
    <!--=== End Content Part  ===-->

</div>

@include('layouts.partials.jsblock')

</body>
</html>