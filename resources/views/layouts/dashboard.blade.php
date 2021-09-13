<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owlcarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owlcarousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title')</title>
    @stack('css')
</head>

<body>
    <div id="dashboard">
        <div class="row no-gutter">
            <div class="col-3">
                @yield('sidebar')
            </div>
            <div class="col-7">
                @yield('content')
            </div>
        </div>
    </div>
    
    <script src="{{ asset('vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('vendors/owlcarousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>

    </script>
    @stack('js')
</body>

</html>
