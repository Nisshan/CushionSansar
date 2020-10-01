<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Title --}}
    <title>Cushion Sansar</title>


    <link rel="icon" href="{{asset('frontend/img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/all.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/themify-icons.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

    @yield('css')

    @livewireStyles
    @bukStyles(true)

</head>

<body>
        {{-- Body Content --}}
        @yield('content')

        {{-- Base Scripts --}}
        <!-- jquery plugins here-->
        <script src="{{asset('frontend/js/jquery-1.12.1.min.js')}}"></script>
        <!-- popper js -->
        <script src="{{asset('frontend/js/popper.min.js')}}"></script>
        <!-- bootstrap js -->
        <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
        <!-- magnific popup js -->
        <script src="{{asset('frontend/js/jquery.magnific-popup.js')}}"></script>
        <!-- carousel js -->
        <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('frontend/js/jquery.nice-select.min.js')}}"></script>
        <!-- slick js -->
        <script src="{{asset('frontend/js/slick.min.js')}}"></script>
        <script src="{{asset('frontend/js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
        <script src="{{asset('frontend/js/contact.js')}}"></script>
        <script src="{{asset('frontend/js/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{asset('frontend/js/jquery.form.js')}}"></script>
        <script src="{{asset('frontend/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('frontend/js/mail-script.js')}}"></script>
        <!-- custom js -->
{{--        <script src="js/custom.js"></script>--}}

        @livewireScripts
        @bukScripts(true)
        {{-- Custom Scripts --}}
        @stack('script')

</body>

</html>
