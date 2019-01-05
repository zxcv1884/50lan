<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>50嵐點餐程式</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <link rel="stypesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stypesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/Lan.css">
    <!-- Styles -->
    <style>
        @import url(https://fonts.googleapis.com/earlyaccess/cwtexkai.css);
        @import url(https://fonts.googleapis.com/earlyaccess/cwtexyen.css);
    </style>
</head>
<body>
<div id="app">
    <main class="position-ref full-height">
        @include('header')
        <div class="main">
            @yield('contents')
        </div>
    </main>
</div>
@if(session()->has('message'))
    <script>
        swal({
            position: 'center',
            type: 'success',
            title:"{{ session('message')}}",
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif

@if(session()->has('error'))
    @foreach(session('error') as $y)
        <script>
            swal({
                position: 'center',
                type: 'error',
                title: '<?php echo $y ?>',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endforeach
@endif
</body>
</html>
