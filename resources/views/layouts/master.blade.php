<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/images/THE VIETNAM NEWSPAPER (1).png') }}" type="image/x-icon">
    {{-- Directory Link --}}
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
        @include('web.parts._header._toast')
        @include('web.parts._header._header')
        @yield('content')
        @include('web.parts._footer._footer')
        @include('web.parts._footer._scroll-to-top')
    </div>

    {{-- Facebook SDK --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" nonce="xK800kdE"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0">
    </script>
    {{-- @include('web.parts.fb._message') --}}

    {{-- Directory Script --}}
    <script src="{{ asset('vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('vendors/owlcarousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script>
        lazyload();
    </script>
    <script>
        $(function() {
            // Sidebar
            $('.sidebar-button').click(function() {
                $('.sidebar').fadeIn('fast');
                $('body').css('overflow-y', 'hidden');
            })
            $('.close-sidebar').click(function() {
                $('.sidebar').fadeOut('fast');
                $('body').css('overflow-y', 'scroll');
            })

            // Search form submit handle
            $('.search-form').submit(function(e) {
                let isValidated = true;
                if ($('#search-input').val() == "") {
                    isValidated = false;
                }
                if (!isValidated) {
                    e.preventDefault();
                }
            })

            // Header search
            $('.search-button').click(function() {
                $('.search-box').fadeIn("fast");
                $('body').css('overflow-y', 'hidden');
            })
            $('.close-search-box').click(function() {
                $('.search-box').fadeOut("fast");
                $('body').css('overflow-y', 'scroll');
            })

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
                    $('.main-header').slideUp("fast");
                    $('.scroll-to-top').show();
                } else {
                    $('.main-header').slideDown("fast");
                    $('.scroll-to-top').hide();
                }
            });

            $('.dropdown-button').hover(function() {
                // over
                $('.dropdown-container').fadeIn('fast');
            }, function() {
                // out
                $('.dropdown-container').fadeOut('fast');
            });

            $('.user-action').hover(function() {
                // over
                $('.user-action-container').fadeIn('fast');
            }, function() {
                // out
                $('.user-action-container').fadeOut('fast');
            });

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
