<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.ico')}}">

    <!--Css -->
    <link href="{{asset('backend/css/bootstrap.min.css')}}" id="bootstrap-stylesheet" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/css/app.min.css')}}" id="app-stylesheet" rel="stylesheet" type="text/css"/>
    <style>
        hr {
            margin-top: .5rem;
            margin-bottom: .5rem;
        }
    </style>
</head>
<body class="authentication-bg">
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">

                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center mb-2">
                            <a href="/" class="logo">
                                <img src="{{asset('backend/images/logo-dark.png')}}" alt="" height="22"
                                     class="logo-dark mx-auto">
                            </a>
                        </div>
                        {{$title}}
                        <hr/>

                        {{$slot}}

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                @if(@$links)
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            {{$links}}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Vendor js -->
<script src="{{asset('backend/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('backend/js/app.min.js')}}"></script>
</body>
</html>
