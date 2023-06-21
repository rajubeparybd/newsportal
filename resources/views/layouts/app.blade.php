<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/images/favicon.png')}}">
    @laravelPWA
    <!-- STYLES -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('frontend/css/simple-line-icons.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" type="text/css" media="all">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->

</head>

<body>

<!-- preloader -->
@include("partials.frontend.preloader")
<!-- site wrapper -->
<div class="site-wrapper">
    <div class="main-overlay"></div>

    <!-- header -->
    @include("partials.frontend.header")

    <!-- section main content -->
    {{$slot}}

    <!-- footer -->
    @include("partials.frontend.footer")
</div><!-- end site wrapper -->

<!-- search popup area -->
@include("partials.frontend.search")

<!-- canvas menu -->
@include("partials.frontend.canvasmenu")

<!-- JAVA SCRIPTS -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.sticky-sidebar.min.js')}}"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>

</body>
</html>
