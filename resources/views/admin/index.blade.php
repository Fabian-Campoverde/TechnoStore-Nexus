@extends('adminlte::page')

@section('title', 'MARAVI VENTAS')

@section('content_header')
    @yield('header')
@stop

@section('content')
    @yield('container')
@stop

@section('css')
@livewireStyles
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css"  rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.0/tailwind.min.css" integrity="sha512-wOgO+8E/LgrYRSPtvpNg8fY7vjzlqdsVZ34wYdGtpj/OyVdiw5ustbFnMuCb75X9YdHHsV5vY3eQq3wCE4s5+g==" crossorigin="anonymous" />
<link rel="stylesheet" href="{{ asset('css/app.css') }}">


@vite(['resources/css/app.css','resources/js/app.js'])


    <link rel="stylesheet" href="/css/admin_custom.css">
    
    @yield('css-2')
@stop

@section('js')
@livewireScripts
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<wireui:scripts />
    @yield('js')
    
@stop