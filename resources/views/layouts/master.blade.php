<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">

    <title>Altair Admin v2.2.0</title>

    <!-- additional styles for plugins -->
        <!-- weather icons -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/weather-icons/css/weather-icons.min.css') }}">
        <!-- metrics graphics (charts) -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/metrics-graphics/dist/metricsgraphics.css') }}">
        <!-- chartist -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/chartist/dist/chartist.min.css') }}">
    
    <!-- uikit -->
    <link rel="stylesheet" href="{{ asset('public/bower_components/uikit/css/uikit.almost-flat.min.css') }}">

    <!-- flag icons -->
    <link rel="stylesheet" href="{{ asset('public/assets/icons/flags/flags.min.css') }}">

    <!-- altair admin -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/main.min.css') }}">

    <!-- matchMedia polyfill for testing media queries in JS -->
    <!--[if lte IE 9]>
        <script type="text/javascript" src="{{ asset('bower_components/matchMedia/matchMedia.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bower_components/matchMedia/matchMedia.addListener.js') }}"></script>
    <![endif]-->

</head>
<body class=" sidebar_main_open sidebar_main_swipe">
   
    @include('layouts.includes._navbar')
    <!-- main sidebar -->

    <!-- left sidebar -->
    @include('layouts.includes._sidebar')

    <!-- content -->
    @yield('content')
    <!-- google web fonts -->

    <!-- common functions -->
    <script src="{{ asset('public/assets/js/common.min.js') }}"></script>
    <!-- uikit functions -->
    <script src="{{ asset('public/assets/js/uikit_custom.min.js') }}"></script>
    <!-- altair common functions/helpers -->
    <script src="{{ asset('public/assets/js/altair_admin_common.min.js') }}"></script>

    <!-- page specific plugins -->
        <!-- d3 -->
        <script src="{{ asset('public/bower_components/d3/d3.min.js') }}"></script>
        <!-- metrics graphics (charts) -->
        <script src="{{ asset('public/bower_components/metrics-graphics/dist/metricsgraphics.min.js') }}"></script>
        <!-- chartist (charts) -->
        <script src="{{ asset('public/bower_components/chartist/dist/chartist.min.js') }}"></script>
        <!-- maplace (google maps) -->
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="{{ asset('public/bower_components/maplace-js/dist/maplace.min.js') }}"></script>
        <!-- peity (small charts) -->
        <script src="{{ asset('public/bower_components/peity/jquery.peity.min.js') }}"></script>
        <!-- easy-pie-chart (circular statistics) -->
        <script src="{{ asset('public/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>
        <!-- countUp -->
        <script src="{{ asset('public/bower_components/countUp.js/countUp.min.js') }}"></script>
        <!-- handlebars.js -->
        <script src="{{ asset('public/bower_components/handlebars/handlebars.min.js') }}"></script>
        <script src="{{ asset('public/public/assets/js/custom/handlebars_helpers.min.js') }}"></script>
        <!-- CLNDR -->
        <script src="{{ asset('public/bower_components/clndr/src/clndr.js') }}"></script>
        <!-- fitvids -->
        <script src="{{ asset('public/bower_components/fitvids/jquery.fitvids.js') }}"></script>

        <!--  dashbord functions -->
        <script src="{{ asset('public/assets/js/pages/dashboard.min.js') }}"></script>
    
       
   
</body>
</html>