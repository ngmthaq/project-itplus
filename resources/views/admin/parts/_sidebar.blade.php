<aside class="dashboard-aside">
    <div class="d-block">
        <a href="/" class="logo logo-sm dashboard-logo d-block text-center my-1 py-2">
            <h1><span>THE</span> VIETNAM</h1>
            <small>NEWSPAPER</small>
        </a>
        <ul class="aside-menu">
            <li class="aside-item">
                <a href="{{ route('admin.dashboard') }}" 
                    class="link admin-action-item @php echo $site == 'dashboard' ? 'active' : '' @endphp">
                    <span>
                        <span class="aside-icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span>Dashboard</span>
                    </span>
                </a>
            </li>
            <li class="aside-item">
                <a href="{{ route('admin.categories') }}" 
                    class="link admin-action-item @php echo $site == 'categories' ? 'active' : '' @endphp">
                    <span>
                        <span class="aside-icon"><i class="far fa-list-alt"></i></span>
                        <span>Quản lý danh mục</span>
                    </span>
                </a>
            </li>
            <li class="aside-item">
                <a href="javascript:void(0)" class="link admin-action-item">
                    <span>
                        <span class="aside-icon"><i class="far fa-file-image"></i></span>
                        <span>Quản lý đa phương tiện</span>
                    </span>
                    <i class="fas fa-angle-down"></i>
                </a>
                <div class="aside-dropdown">
                    <ul>
                        <li>
                            <a class="link admin-action-item" href="#">Thêm hình ảnh</a>
                        </li>
                        <li>
                            <a class="link admin-action-item" href="#">Thêm video</a>
                        </li>
                        <li>
                            <a class="link admin-action-item" href="#">Kho lưu trữ</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="aside-item">
                <a href="javascript:void(0)" class="link admin-action-item">
                    <span>
                        <span class="aside-icon"><i class="far fa-file-alt"></i></span>
                        <span>Quản lý bài viết</span>
                    </span>
                    <i class="fas fa-angle-down"></i>
                </a>
                <div class="aside-dropdown">
                    <ul>
                        <li>
                            <a class="link admin-action-item" href="#">Thêm bài viết</a>
                        </li>
                        <li>
                            <a class="link admin-action-item" href="#">Sửa bài viết</a>
                        </li>
                        <li>
                            <a class="link admin-action-item" href="#">Xoá bài viết</a>
                        </li>
                        <li>
                            <a class="link admin-action-item" href="#">Xem tất cả</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="aside-item">
                <a href="javascript:void(0)" class="link admin-action-item">
                    <span>
                        <span class="aside-icon"><i class="far fa-file-video"></i></span>
                        <span>Quản lý video</span>
                    </span>
                    <i class="fas fa-angle-down"></i>
                </a>
                <div class="aside-dropdown">
                    <ul>
                        <li>
                            <a class="link admin-action-item" href="#">Thêm bài viết</a>
                        </li>
                        <li>
                            <a class="link admin-action-item" href="#">Sửa bài viết</a>
                        </li>
                        <li>
                            <a class="link admin-action-item" href="#">Xoá bài viết</a>
                        </li>
                        <li>
                            <a class="link admin-action-item" href="#">Xem tất cả</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="aside-item">
                <a href="javascript:void(0)" class="link admin-action-item">
                    <span>
                        <span class="aside-icon"><i class="far fa-user"></i></span>
                        <span>Quản lý người dùng</span>
                    </span>
                    <i class="fas fa-angle-down"></i>
                </a>
                <div class="aside-dropdown">
                    <ul>
                        <li>
                            <a class="link admin-action-item" href="#">Xoá người dùng vi phạm</a>
                        </li>
                        <li>
                            <a class="link admin-action-item" href="#">Quyền quản trị viên</a>
                        </li>
                        <li>
                            <a class="link admin-action-item" href="#">Xem tất cả</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div class="d-block" style="border-top: 1px solid var(--main-color);">
        <ul class="admin-aside-action d-flex align-items-center justify-content-between">
            <li style="font-size: 18px; font-weight: 300; color: var(--main-color); user-select: none;">
                {{ Auth::user()->first_name }}
                {{ Auth::user()->last_name }}
            </li>
            <li>
                <a title="Trang chủ" href="/" class="link admin-action-item d-inline-block px-2"><i class="fas fa-home"></i></a>
                <a title="Đăng xuất" href="{{ route('logout') }}" class="link d-inline-block px-2"><i
                        class="fas fa-power-off"></i></a>
            </li>
        </ul>
    </div>
</aside>
