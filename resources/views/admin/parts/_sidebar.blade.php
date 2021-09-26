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
            <li class="aside-item add-image add-video media-store">
                <a href="javascript:void(0)"
                    class="link admin-action-item 
                    @php echo $site == 'add-image' || $site == 'add-video' 
                        || $site == 'media-store' ? 'active' : '' 
                    @endphp">
                    <span>
                        <span class="aside-icon"><i class="far fa-file-image"></i></span>
                        <span>Quản lý media</span>
                    </span>
                    <i class="fas fa-angle-down"></i>
                </a>
                <div class="aside-dropdown">
                    <ul>
                        <li>
                            <a class="link admin-action-item @php echo $site == 'add-image' ? 'active' : '' @endphp"
                                href="{{ route('admin.addImageForm') }}">
                                Thêm hình ảnh
                            </a>
                        </li>
                        <li>
                            <a class="link admin-action-item @php echo $site == 'add-video' ? 'active' : '' @endphp"
                                href="{{ route('admin.addVideoForm') }}">
                                Thêm video
                            </a>
                        </li>
                        <li>
                            <a class="link admin-action-item @php echo $site == 'media-store' ? 'active' : '' @endphp"
                                href="{{ route('admin.mediaStore') }}">
                                Kho lưu trữ
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="aside-item">
                <a href="javascript:void(0)"
                    class="link admin-action-item
                    @php echo $site == 'create-casual-post' || $site == 'manage-casual-post' 
                        || $site == 'edit-casual-post' ? 'active' : '' 
                    @endphp">
                    <span>
                        <span class="aside-icon"><i class="far fa-file-alt"></i></span>
                        <span>Quản lý bài viết</span>
                    </span>
                    <i class="fas fa-angle-down"></i>
                </a>
                <div class="aside-dropdown">
                    <ul>
                        <li>
                            <a class="link admin-action-item
                            @php echo $site == 'create-casual-post' ? 'active' : '' @endphp"
                                href="{{ route('post.createCasualPostForm') }}">Thêm bài viết</a>
                        </li>
                        <li>
                            <a class="link admin-action-item
                            @php echo $site == 'manage-casual-post' ? 'active' : '' @endphp"
                                href="{{ route('post.manageCasualPost') }}">Xem tất cả</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="aside-item">
                <a href="javascript:void(0)" class="link admin-action-item @php echo $site == 'manage-video-post' 
                    || $site == 'create-video-post' || $site == 'edit-video-post' ? 'active' : '' @endphp">
                    <span>
                        <span class="aside-icon"><i class="far fa-file-video"></i></span>
                        <span>Quản lý video</span>
                    </span>
                    <i class="fas fa-angle-down"></i>
                </a>
                <div class="aside-dropdown">
                    <ul>
                        <li>
                            <a class="link admin-action-item @php echo $site == 'create-video-post' ? 'active' : '' @endphp" 
                                href="{{ route('post.createVideoPostForm') }}">Thêm bài viết</a>
                        </li>
                        <li>
                            <a class="link admin-action-item @php echo $site == 'manage-video-post' ? 'active' : '' @endphp" 
                                href="{{ route('post.manageVideoPost') }}">Xem tất cả</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="aside-item">
                <a href="{{ route('admin.userManagerForm') }}" 
                    class="link admin-action-item @php echo $site == 'manage-user' ? 'active' : '' @endphp">
                    <span>
                        <span class="aside-icon"><i class="far fa-user"></i></span>
                        <span>Quản lý người dùng</span>
                    </span>
                </a>
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
                <a title="Trang chủ" href="/" class="link admin-action-item d-inline-block px-2"><i
                        class="fas fa-home"></i></a>
                <a title="Đăng xuất" href="{{ route('logout') }}" class="link d-inline-block px-2"><i
                        class="fas fa-power-off"></i></a>
            </li>
        </ul>
    </div>
</aside>
