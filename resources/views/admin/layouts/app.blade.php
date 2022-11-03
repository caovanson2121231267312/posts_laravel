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
</head>
<body class="sidebar-mini">
    <div class="wrapper">
        @include('admin.layouts.header')
        @include('admin.layouts.siderbar')

        @yield('body')

        @include('admin.layouts.footer')
    </div>
    {{-- @vite('resources/js/app.js') --}}
</body>
</html>

