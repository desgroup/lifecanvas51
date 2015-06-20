<!-- JS Global Compulsory -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/jquery/jquery-migrate.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="assets/plugins/back-to-top.js"></script>
<script src="assets/plugins/smoothScroll.js"></script>

<!-- JS Customization -->
<script type="text/javascript" src="assets/js/custom.js"></script>

<!-- JS Page Level -->
<script src="assets/js/app.js"></script>
@yield('pagejs')
<script>
    jQuery(document).ready(function() {
        App.init();
    });
    @yield('init_scripts')
</script>

<!--[if lt IE 9]>
<script src="assets/plugins/respond.js"></script>
<script src="assets/plugins/html5shiv.js"></script>
<script src="assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->
