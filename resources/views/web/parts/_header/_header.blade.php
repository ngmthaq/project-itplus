<header>
    <div class="container">
        {{-- Top header --}}
        <ul class="top-header">
            <li id="currentTime">
                {{ date('l, d-m-Y H:i:s') }}
            </li>
            <li>
                <a href="#" class="vi link @php echo $site == 'login' ? ' active ' : '' @endphp">Đăng nhập</a>
                <span>/</span>
                <a href="#" class="vi link @php echo $site == 'register' ? ' active ' : '' @endphp">Đăng ký</a>
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
                <div class="col-9">
                    <ul class="my-navbar-list">
                        @foreach ($categories as $category)
                            <li>
                                <a href="#">{{ $category->name_vi }}</a>
                            </li>
                        @endforeach
                        <li><a href="#">Video</a></li>
                        <li class="dropdown-button">
                            <a href="javascript:void(0)">Thêm <i class="fas fa-angle-down"></i></a>
                            <div class="dropdown-container">
                                <a href="#">Giới thiệu</a>
                                <a href="#">Liên hệ</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-3 d-flex justify-content-end">
                    <form action="" class="search-form">
                        <input type="text" name="search" id="search" class="search-input" placeholder="Tìm kiếm ...">
                        <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>
