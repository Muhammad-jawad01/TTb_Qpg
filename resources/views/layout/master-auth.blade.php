<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title', '') | QPG APP </title>
    <link rel="shortcut icon" href="{{asset('logo-1.ico')}}" type="image/x-icon">
    <!-- initiate head with meta tags, css and script -->
    @include('include.head')
    @livewireStyles
</head>

<body class="{{ $theme . 'mode' }}" data-base-url="{{ url('/') }}">
    <!-- Loader Starts -->
    @include('include.loader')
    <!--  Loader Ends -->

    <!--  Main Container Starts  -->
    @yield('content')
    <!-- Main Container Ends -->
    @include('include.scripts')
    @stack('plugin-scripts')

    @include('sweetalert::alert')
    @livewireScripts


</body>

</html>
