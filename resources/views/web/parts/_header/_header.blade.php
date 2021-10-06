<header>
    <div class="container">
        {{-- Top header --}}
        <ul class="top-header d-none d-xl-flex">
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
                            <a href="{{ route('userInformation.show') }}"
                                class="link user-action-item @php echo $site == 'userInformation' ? 'active' : '' @endphp">
                                Thông tin cá nhân
                            </a>
                            <a href="{{ route('userInformation.showEditForm') }}"
                                class="link user-action-item @php echo $site == 'editUserInformation' ? 'active' : '' @endphp">
                                Thay đổi thông tin cá nhân
                            </a>
                            <a href="{{ route('user.changePasswordForm') }}"
                                class="link user-action-item @php echo $site == 'changePassword' ? 'active' : '' @endphp">
                                Thay đổi mật khẩu
                            </a>
                            <a href="{{ route('logout') }}" class="required"
                                style="border-top: 1px solid #999; margin-top: 6px;">
                                Đăng xuất
                            </a>
                        </div>
                    </a>
                @else
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#login-modal"
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
            <div class="col-xl-6 col-12 text-center text-xl-left">
                <a href="/" class="logo">
                    <h1><span>THE</span> VIETNAM</h1>
                    <small>NEWSPAPER</small>
                </a>
            </div>
            <div class="col-xl-6 d-none d-xl-block">
                <ul class="social">
                    <li><a target="_blank" href="https://facebook.com/thevietnamnewspaper"><i
                                class="fab fa-facebook-f"></i></a></li>
                    <li><a target="_blank" href="https://youtube.com"><i class="fab fa-youtube"></i></a></li>
                    <li><a target="_blank" href="https://tiktok.com"><i class="fab fa-tiktok"></i></a></li>
                    <li><a href="mailto:ngmthaq12@gmail"><i class="far fa-envelope"></i></a></li>
                    <li><a href="tel:0522676941"><i class="fas fa-phone"></i></a></li>
                </ul>
            </div>
        </div>

        {{-- Navbar --}}
        <nav class="my-navbar">
            <div class="row align-items-center">
                <div class="col-xl-11 d-none d-xl-block">
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
                <div class="col-6 d-xl-none d-block">
                    <div class="sidebar-button">
                        <span>
                            <i class="fas fa-bars"></i>
                        </span>
                    </div>
                </div>
                <div class="col-xl-1 col-6 d-flex justify-content-end">
                    <form action="{{ route('post.search') }}" class="search-form">
                        <button type="button" class="search-button"><i class="fas fa-search"></i></button>
                        <div class="search-box">
                            <button type="button" class="close-search-box">&times;</button>
                            <div class="search-content">
                                <input type="text" name="search_input" id="search-input" class="search-input"
                                    placeholder="Tìm kiếm...">
                                <button type="submit" class="button-md-main d-flex" style="margin: 4px auto;">
                                    Tìm kiếm
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>
<aside class="sidebar" style="overflow-y: scroll;">
    <button class="close-sidebar">&times;</button>
    <ul class="d-block text-center">
        <li>
            <a href="/" class="logo d-block text-center py-5">
                <h1 style="color: #fff;"><span>THE</span> VIETNAM</h1>
                <span style="color: var(--main-color);">NEWSPAPER</span>
            </a>
        </li>
        <li>
            <a href="/" class="sidebar-item @php echo $site == 'homepage' ? 'active' : '' @endphp">
                <i class="fas fa-home"></i>
                Trang chủ
            </a>
        </li>
        <li>
            <a href="{{ route('default.breakingNews') }}"
                class="sidebar-item @php echo $site == 'breaking-news' ? 'active' : '' @endphp">
                Tin mới
            </a>
        </li>
        @foreach ($categories as $category)
            <li>
                <a href="{{ route('category.showPosts', ['category' => $category->id]) }}"
                    class="sidebar-item @php echo $site == $category->id ? 'active' : ''  @endphp">
                    {{ $category->name_vi }}
                </a>
            </li>
        @endforeach
        <li class="dropdown-button">
            <a href="{{ route('category.showVideos') }}"
                class="sidebar-item @php echo $site == 'videos' ? 'active' : '' @endphp">
                Video
            </a>
        </li>
        <li>
            <a class="sidebar-item @php echo $site == 'about' ? 'active' : '' @endphp" href="{{ route('about') }}">
                Giới thiệu
            </a>
        </li>
        <li>
            <a class="sidebar-item @php echo $site == 'contact' ? 'active' : '' @endphp"
                href="{{ route('contact') }}">
                Liên hệ
            </a>
        </li>
    </ul>
    <hr style="border-top: 1px solid #999;">
    <ul class="d-block text-center mb-3">
        @if (!Auth::check())
            <li>
                @if ($site == 'register' || $site == 'login' || $site == 'contact' || $site == 'resetPassword')
                    <a class="sidebar-item @php echo $site == 'login' ? 'active' : '' @endphp" href="{{ route('login.show') }}">
                        Đăng nhập
                    </a>
                @else
                    <a class="sidebar-item" href="javascript:void(0)" data-toggle="modal" data-target="#login-modal">
                        Đăng nhập
                    </a>
                @endif
            </li>
            <li>
                <a class="sidebar-item @php echo $site == 'register' ? 'active' : '' @endphp"
                    href="{{ route('register.show') }}">
                    Đăng ký
                </a>
            </li>
        @else
            <li>
                <a href="{{ route('userInformation.show') }}"
                    class="sidebar-item @php echo $site == 'userInformation' ? 'active' : '' @endphp">
                    Thông tin cá nhân
                </a>
            </li>
            <li>
                <a href="{{ route('userInformation.showEditForm') }}"
                    class="sidebar-item @php echo $site == 'editUserInformation' ? 'active' : '' @endphp">
                    Thay đổi thông tin cá nhân
                </a>
            </li>
            <li>
                <a href="{{ route('user.changePasswordForm') }}"
                    class="sidebar-item @php echo $site == 'changePassword' ? 'active' : '' @endphp">
                    Thay đổi mật khẩu
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="sidebar-item required">
                    Đăng xuất
                </a>
            </li>
        @endif
    </ul>
</aside>
@if ($site != 'register' && $site != 'login' && $site != 'contact' && $site != 'resetPassword')
    @include('web.parts._header._loggin-modal')
@endif
