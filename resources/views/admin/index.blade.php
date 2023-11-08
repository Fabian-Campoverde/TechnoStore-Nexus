@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @yield('header')
@stop

@section('content')
    @yield('container')
@stop

@section('css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css"  rel="stylesheet" />

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@vite(['resources/css/app.css','resources/js/app.js'])

    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop

@section('js')
    @yield('js')
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
@stop