<!--

=========================================================
* Volt - Bootstrap 5 Admin Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2020 Themesberg (https://www.themesberg.com)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Primary Meta Tags -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Juan Diego Parra mendez">
    <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Volt CSS -->
    <link type="text/css" href="/css/volt.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
</head>

<body>
<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-md-none">
    <a class="navbar-brand mr-lg-5" >

    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-md-none collapsed" type="button" data-toggle="collapse"
                data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="container-fluid bg-soft">
    <div class="row">
        <div class="col-12">
            <x-sidebar/>
            <main class="content">
                <x-topnav>
                    {{$header ?? ''}}
                </x-topnav>
                {{$slot}}
            </main>
        </div>
    </div>
</div>

<!-- Core -->
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<!-- Volt JS -->
<script src="/js/volt.js"></script>


</body>

</html>
