<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <link rel="stylesheet" href="{!! asset('assets/css/app.css') !!}">
</head>
<body>
    
    @include('components.guest_navbar')

    @yield('content')

    @include('components.footer')

</body>
</html>