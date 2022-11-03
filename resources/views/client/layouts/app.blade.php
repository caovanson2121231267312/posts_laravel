<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    @yield('title')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')
     {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
</head>
<body class="sidebar-mini">
    {{-- <div class="wrapper"> --}}
        {{-- @include('admin.layouts.header') --}}
        {{-- @include('admin.layouts.siderbar') --}}

        @yield('body')

        {{-- @include('admin.layouts.footer') --}}
    {{-- </div> --}}
    {{-- @vite('resources/js/app.js') --}}
</body>
</html>

