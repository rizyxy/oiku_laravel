<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <link rel="stylesheet" href="{!! asset('assets/css/consignor/style.css') !!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    @yield('css')

</head>
<body>
    
    @include('components.consignor_navbar')

    @yield('content')

    @include('components.footer')

</body>
<script src="{!! asset('assets/js/customer/main.js') !!}"></script>
</html>