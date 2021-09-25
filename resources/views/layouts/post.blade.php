<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Directory Link --}}
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owlcarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owlcarousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- CDN Link --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.7.0/css/ol.css" type="text/css">
    <title>@yield('title')</title>
    @stack('css')
</head>

<body>
    <div id="master">
        @include('web.parts._header._toast')
        @include('web.parts._header._header')
        @yield('content')
        @include('web.parts._footer._footer')
        @include('web.parts._footer._scroll-to-top')
    </div>

    {{-- CDN Script --}}
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.7.0/build/ol.js"></script>

    {{-- Directory Script --}}
    <script src="{{ asset('vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('vendors/owlcarousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(function() {
            // Toast animation
            $('.my-toast span').click(function() {
                $(this).parent().fadeOut();
            })
            setTimeout(() => {
                $('.my-toast').fadeOut();
            }, 5000);

            // Scroll event
            $(window).scroll(function() {
                if (document.body.scrollTop > 140 || document.documentElement.scrollTop > 140) {
                    $('.top-header').slideUp("fast");
                    $('.main-header').slideUp("fast");
                    $('.scroll-to-top').show();
                } else {
                    $('.top-header').slideDown("fast");
                    $('.main-header').slideDown("fast");
                    $('.scroll-to-top').hide();
                }
            });

            // Navbar dropdown
            // $('.dropdown-button').click(function() {
            //     $('.dropdown-container').slideToggle("fast");
            // })
            $('.dropdown-button').hover(function () {
                    // over
                    $('.dropdown-container').slideDown('fast');
                }, function () {
                    // out
                    $('.dropdown-container').slideUp('fast');
                }
            );

            // User action dropdown
            // $('.user-action').click(function() {
            //     $('.user-action-container').slideToggle();
            // });
            $('.user-action').hover(function () {
                    // over
                    $('.user-action-container').slideDown('fast');
                }, function () {
                    // out
                    $('.user-action-container').slideUp('fast');
                }
            );

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

    {{-- Map Script --}}
    <script type="text/javascript">
        var map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([105.7750235, 21.0367009]),
                zoom: 17
            })
        });
    </script>
    @stack('js')
</body>

</html>
