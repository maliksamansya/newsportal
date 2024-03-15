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

    {{--<link rel="stylesheet" href="{{ asset('frontend/css/breaking-news-ticker.css') }}">--}}
</head>
<body>
    
    <header>

        @include('version2.frontend.layout.partials.header')

       {{-- @include('frontend.layout.partials.mainmenu') --}} 
            
    </header>

    @yield('content')

    <footer>

        @include('frontend.layout.partials.footer')

    </footer>

    <!-- jQuery 3 -->
    <script src="{{ asset('backend/components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/breaking-news-ticker.min.js') }}"></script>

    @stack('scripts')

    <script>
        $(function(){
            $('#breakingnewsticker').breakingNews({radius: 0});
        });
    </script>
    
</body>
</html>