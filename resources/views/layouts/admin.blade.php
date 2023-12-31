<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }} :: Admin Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.ico')}}">

    @stack("styles")
    <!--Css -->
    <link href="{{asset('backend/css/bootstrap.min.css')}}" id="bootstrap-stylesheet" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/css/app.min.css')}}" id="app-stylesheet" rel="stylesheet" type="text/css"/>
    @if(Cookie::get("theme") == "dark")
        <link href="{{asset('backend/css/bootstrap-dark.min.css')}}" id="bootstrap-dark-stylesheet" rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('backend/css/app-dark.min.css')}}" id="app-dark-stylesheet" rel="stylesheet"
              type="text/css"/>
    @endif
</head>
<body @if(Cookie::get("theme") == "dark") data-topbar="dark" data-sidebar="dark" @endif >
<!-- Begin page -->
<div id="wrapper">

    <!-- Top bar Start -->
    @include("partials.admin.topbar")

    <!-- ========== Left Sidebar Start ========== -->
    @include("partials.admin.sidebar")

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                {{$slot}}
            </div>
        </div>

        <!-- Footer Start -->
        @include("partials.admin.footer")
    </div>
</div>


<!-- Vendor js -->
<script src="{{asset('backend/js/vendor.min.js')}}"></script>
@stack("scripts")
<!-- App js -->
<script src="{{asset('backend/js/app.min.js')}}"></script>
</body>
</html>
