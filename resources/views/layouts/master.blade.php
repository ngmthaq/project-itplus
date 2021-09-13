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
    <div id="master">
        @include('web.parts._header._header')
        @yield('content')
        @include('web.parts._footer._footer')
        @include('web.parts._footer._scroll-to-top')
    </div>

    <script src="{{ asset('vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('vendors/owlcarousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(function() {
            // Scroll event
            $(window).scroll(function () { 
                if (document.body.scrollTop > 5 || document.documentElement.scrollTop > 5) {
                    console.log('a');
                    $('header').css('position', 'fixed');
                    $('.top-header').slideUp();
                    $('.main-header').slideUp();
                    $('.scroll-to-top').css('display', 'block');
                } else {
                    console.log('b');
                    $('header').css('position', 'relative');
                    $('.top-header').slideDown();
                    $('.main-header').slideDown();
                    $('.scroll-to-top').css('display', 'none');
                }
            });

            // Navbar dropdown
            $('.dropdown-button').click(function() {
                $('.dropdown-container').slideToggle();
            })

            // Hiển thị thời gian
            setInterval(function() {
                const DATE = new Date();
                let day = DATE.getDay();
                let date = DATE.toLocaleDateString()
                let time = DATE.toLocaleTimeString();
                let dayHandle;
                switch (day) {
                    case 0:
                        dayHandle = "Chủ Nhật";
                        break;
                    case 1:
                        dayHandle = "Thứ Hai";
                        break;
                    case 2:
                        dayHandle = "Thứ Ba";
                        break;
                    case 3:
                        dayHandle = "Thứ Tư";
                        break;
                    case 4:
                        dayHandle = "Thứ Năm";
                        break;
                    case 5:
                        dayHandle = "Thứ Sáu";
                        break;
                    case 6:
                        dayHandle = "Thứ Bảy";
                        break;
                    default:
                        dayHandle = "";
                }
                $('#currentTime').html(dayHandle + ", " + date + " " + time);
            }, 1000)
        })
    </script>
    @stack('js')
</body>

</html>
