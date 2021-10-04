<header class="d-xl-block d-none">
    <div class="container">
        {{-- Top header --}}
        <ul class="top-header">
            <li id="currentTime">
                {{ date('l, d-m-Y H:i:s') }}
            </li>
            <li @auth class="user-action" @endauth>
                @if (Auth::check())
                    <a href="javascript:void(0)" class="link">
                        <span style="padding: 20px 0;">
                            {{ Auth::user()->first_name }}
                            {{ Auth::user()->last_name }}
                            <i class="fas fa-angle-down"></i>
                        </span>
                        <div class="user-action-container">
                            <a href="#" class="link user-action-item">Xem thông tin cá nhân</a>
                            <a href="#" class="link user-action-item">Thay đổi thông tin cá nhân</a>
                            <a href="{{ route('user.changePasswordForm') }}"
                                class="link user-action-item @php echo $site == 'changePassword' ? 'active' : '' @endphp">
                                Thay đổi mật khẩu
                            </a>
                            <a href="{{ route('logout') }}" class="required"
                                style="border-top: 1px solid #999; margin-top: 6px;">Đăng xuất</a>
                        </div>
                    </a>
                @else
                    <a href="{{ route('login.show') }}"
                        class="vi link @php echo $site == 'login' ? ' active ' : '' @endphp">
                        Đăng nhập
                    </a>
                    <span>/</span>
                    <a href="{{ route('register.show') }}"
                        class="vi link @php echo $site == 'register' ? ' active ' : '' @endphp">
                        Đăng ký
                    </a>
                @endif
            </li>
        </ul>

        {{-- Main header --}}
        <div class="main-header row align-items-center">
            <div class="col-lg-6">
                <a href="/" class="logo">
                    <h1><span>THE</span> VIETNAM</h1>
                    <small>NEWSPAPER</small>
                </a>
            </div>
            <div class="col-lg-6">
                <ul class="social">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fab fa-tiktok"></i></a></li>
                    <li><a href="#"><i class="far fa-envelope"></i></a></li>
                    <li><a href="#"><i class="fas fa-phone"></i></a></li>
                </ul>
            </div>
        </div>

        {{-- Navbar --}}
        <nav class="my-navbar">
            <div class="row align-items-center">
                <div class="col-11">
                    <ul class="my-navbar-list">
                        <li>
                            <a href="/" class="@php echo $site == 'homepage' ? 'active' : '' @endphp">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('default.breakingNews') }}"
                                class="@php echo $site == 'breaking-news' ? 'active' : '' @endphp">
                                Tin mới
                            </a>
                        </li>
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('category.showPosts', ['category' => $category->id]) }}"
                                    class="@php echo $site == $category->id ? 'active' : ''  @endphp">
                                    {{ $category->name_vi }}
                                </a>
                            </li>
                        @endforeach
                        <li class="dropdown-button">
                            <a href="javascript:void(0)"
                                class="@php echo $site == 'videos' || $site == 'about' || $site == 'contact' ? 'active' : '' @endphp">
                                Thêm <i class="fas fa-angle-down"></i>
                            </a>
                            <div class="dropdown-container">
                                <a href="{{ route('category.showVideos') }}"
                                    class="@php echo $site == 'videos' ? 'active' : '' @endphp">
                                    Video
                                </a>
                                <a class="@php echo $site == 'about' ? 'active' : '' @endphp"
                                    href="{{ route('about') }}">Giới thiệu</a>
                                <a class="@php echo $site == 'contact' ? 'active' : '' @endphp"
                                    href="{{ route('contact') }}">Liên hệ</a>
                                @auth
                                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                                        <a href="{{ route('admin.dashboard') }}">Quản lý</a>
                                    @endif
                                @endauth
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-1 d-flex justify-content-end">
                    <form action="{{ route('post.search') }}" class="search-form">
                        <button type="button" class="search-button"><i class="fas fa-search"></i></button>
                        <div class="search-box">
                            <button type="button" class="close-search-box">&times;</button>
                            <div class="search-content">
                                <input type="text" name="search_input" id="search-input" class="search-input">
                                <button type="submit" class="btn btn-sm btn-info d-flex" style="margin: 4px auto;">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>
<header class="d-block d-xl-none">

</header>
