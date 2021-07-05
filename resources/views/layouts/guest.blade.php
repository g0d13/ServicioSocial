<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Volt CSS -->
    <link type="text/css" href="/css/volt.css" rel="stylesheet">
    <!-- Core -->
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- Volt JS -->
    <script src="/js/volt.js"></script>
</head>
<body>

<!-- Page Content -->
<main>
    {{ $slot }}
</main>

</body>
</html>
