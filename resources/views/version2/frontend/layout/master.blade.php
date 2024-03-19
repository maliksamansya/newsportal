<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>News - @yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('version2/assets/img/favicon.ico') }}">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{ asset('version2/assets/css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('version2/assets/css/owl.carousel.min.css') }}">
            <link rel="stylesheet" href="{{ asset('version2/assets/css/ticker-style.css') }}">
            <link rel="stylesheet" href="{{ asset('version2/assets/css/flaticon.css') }}">
            <link rel="stylesheet" href="{{ asset('version2/assets/css/ticker-style.css') }}">
            <link rel="stylesheet" href="{{ asset('version2/assets/css/animate.min.css') }}">
            <link rel="stylesheet" href="{{ asset('version2/assets/css/magnific-popup.css') }}">
            <link rel="stylesheet" href="{{ asset('version2/assets/css/fontawesome-all.min.css') }}">
            <link rel="stylesheet" href="{{ asset('version2/assets/css/themify-icons.css') }}">
            <link rel="stylesheet" href="{{ asset('version2/assets/css/slick.css') }}">
            <link rel="stylesheet" href="{{ asset('version2/assets/css/nice-select.css') }}">
            <link rel="stylesheet" href="{{ asset('version2/assets/css/style.css') }}">

            <!-- Other CSS links -->
            @stack('styles')

</head>
<body>
    
    <header>

        @include('version2.frontend.layout.partials.header')

       {{-- @include('frontend.layout.partials.mainmenu') --}} 
            
    </header>

    @yield('content')

    <footer>

        @include('version2.frontend.layout.partials.footer')

    </footer>

    <!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{ asset('version2/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{ asset('version2/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('version2/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('version2/assets/js/bootstrap.min.js') }}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{ asset('version2/assets/js/jquery.slicknav.min.js') }}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{ asset('version2/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('version2/assets/js/slick.min.js') }}"></script>
        <!-- Date Picker -->
        <script src="{{ asset('version2/assets/js/gijgo.min.js') }}"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="{{ asset('version2/assets/js/wow.min.js') }}"></script>
		<script src="{{ asset('version2/assets/js/animated.headline.js') }}"></script>
        <script src="{{ asset('version2/assets/js/jquery.magnific-popup.js') }}"></script>

        <!-- Breaking New Pluging -->
        <script src="{{ asset('version2/assets/js/jquery.ticker.js') }}"></script>
        <script src="{{ asset('version2/assets/js/site.js') }}"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{ asset('version2/assets/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('version2/assets/js/jquery.nice-select.min.js') }}"></script>
		<script src="{{ asset('version2/assets/js/jquery.sticky.js') }}"></script>
        
        <!-- contact js -->
        <script src="{{ asset('version2/assets/js/contact.js') }}"></script>
        <script src="{{ asset('version2/assets/js/jquery.form.js') }}"></script>
        <script src="{{ asset('version2/assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('version2/assets/js/mail-script.js') }}"></script>
        <script src="{{ asset('version2/assets/js/jquery.ajaxchimp.min.js') }}"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{ asset('version2/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('version2/assets/js/main.js') }}"></script>

    @stack('scripts')

    <script>
        $(function(){
            $('#breakingnewsticker').breakingNews({radius: 0});
        });
    </script>
    
</body>
</html>