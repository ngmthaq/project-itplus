@extends('layouts.master')

@section('title')
    {{ $category->name_vi }} | The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@push('css')
    <style>
        .post-container {
            background-color: #fff;
            border-radius: 2px;
            overflow: hidden;
            position: relative;
        }

        .category-type {
            position: absolute;
            top: 0;
            left: 0;
            background: var(--main-color);
            color: #fff;
            padding: 2px 4px;
        }

        .img-container {
            height: 300px;
        }

        .img-container img {
            object-fit: cover;
        }

        .content-container {
            padding: 0 12px;
        }

        .content-container .title {
            height: 50px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            margin: 6px 0;
        }

        .content-container .subtitle {
            height: 100px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 4;
            margin-bottom: 12px;
        }

        .popular-item {
            position: relative;
        }

        .type-name {
            position: absolute;
            top: 0;
            left: 0;
            padding: 1px 2px;
        }
    </style>
@endpush

@section('content')
    <div class="container split-header">
        <div class="row mb-3">
            <div class="col-12">
                <ul class="breadcrum vi mt-0">
                    <li><a href="/">Trang chủ</a></li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>{{ $category->name_vi }}</li>
                </ul>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-9">
                <div class="row mb-3" id="casual">
                    <div class="col-12">
                        <h5 class="py-3">Bài viết mới</h5>
                    </div>
                    @if (count($casualPosts) > 0)
                        @foreach ($casualPosts as $post)
                            <div class="col-4 casual-posts">
                                <div class="post-container mb-3">
                                    <small class="category-type">
                                        {{ $post->category->name_vi }} - {{ $post->type->name_vi }}
                                    </small>
                                    <div class="img-container">
                                        <img src="{{ $post->cover_url }}" alt="{{ $post->cover_url }}" width="100%"
                                            height="100%">
                                    </div>
                                    <div class="content-container">
                                        <h5 class="title" title="{{ $post->title_vi }}">
                                            <a href="{{ route('post.showPostDetail', ['post' => $post->id]) }}" class="link">{{ $post->title_vi }}</a>
                                        </h5>
                                        <p class="subtitle" title="{{ $post->subtitle_vi }}">
                                            {{ $post->subtitle_vi }}
                                        </p>
                                        <small class="mb-2 d-block">Đăng bài: {{ date('d/m/Y', strtotime($post->created_at)) }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <p>Không có bài viết</p>
                        </div>
                    @endif
                </div>
                @if (count($casualPosts) > 0)
                    <div class="row mb-3">
                        <div class="col-12 text-center">
                            <button class="btn btn-outline-info" onclick="loadmoreCasualPosts(this)"
                                data-category="{{ $category->id }}">
                                XEM THÊM
                            </button>
                        </div>
                    </div>
                @endif
                <div class="row" id="video">
                    <div class="col-12">
                        <h5 class="py-3" style="border-top: 1px solid #999;">Video</h5>
                    </div>
                    @if (count($videoPosts) > 0)
                        @foreach ($videoPosts as $post)
                            <div class="col-4 video-posts">
                                <div class="post-container mb-3">
                                    <small class="category-type">
                                        {{ $post->category->name_vi }} - {{ $post->type->name_vi }}
                                    </small>
                                    <div class="img-container">
                                        <img src="{{ $post->cover_url }}" alt="{{ $post->cover_url }}" width="100%"
                                            height="100%">
                                    </div>
                                    <div class="content-container">
                                        <h5 class="title" title="{{ $post->title_vi }}">
                                            <a href="{{ route('post.showPostDetail', ['post' => $post->id]) }}" class="link">{{ $post->title_vi }}</a>
                                        </h5>
                                        <p class="subtitle" title="{{ $post->subtitle_vi }}">
                                            {{ $post->subtitle_vi }}
                                        </p>
                                        <small class="mb-2 d-block">Đăng bài: {{ date('d/m/Y', strtotime($post->created_at)) }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <p>Không có bài viết</p>
                        </div>
                    @endif
                </div>
                @if (count($videoPosts) > 0)
                    <div class="row mb-3">
                        <div class="col-12 text-center">
                            <button class="btn btn-outline-info" onclick="loadmoreVideoPosts(this)"
                                data-category="{{ $category->id }}">
                                XEM THÊM
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-3">
                <h5 class="py-3">&nbsp;</h5>
                <div class="mb-3">
                    <h5 class="py-3 px-1 bg-blue text-center">Danh mục</h5>
                    <div class="category-count-container p-1 bg-light">
                        <ul>
                            @foreach ($categories as $category)
                                <li class="label-container py-2 px-1">
                                    <a href="{{ route('category.showPosts', ['category' => $category->id]) }}"
                                        class="link d-inline-block @php echo $site == $category->id ? 'active' : '' @endphp">
                                        {{ $category->name_vi }}
                                    </a>
                                    <span>{{ $category->posts_count }} bài</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="popular-posts mb-3">
                    <h5 class="py-3 px-1 bg-secondary text-center text-light">Phổ biến</h5>
                    <ul class="popular-posts-container bg-light pb-1">
                        @foreach ($popularPosts as $post)
                            <li class="label-container popular-item mb-3" style="height: 120px; border-bottom: 1px solid #999;">
                                <small class="type-name bg-main">{{ $post->type->name_vi }}</small>
                                <div class="img-container" style="height: inherit; flex: 1;">
                                    <img src="{{ $post->cover_url }}" alt="{{ $post->cover_url }}" width="100%" height="100%">
                                </div>
                                <div class="content-container" style="flex: 1;">
                                    <p>
                                        <strong>
                                            <a href="{{ route('post.showPostDetail', ['post' => $post->id]) }}" class="link title">
                                                {{ $post->title_vi }}
                                            </a>
                                            <small>{{ date('d/m/Y', strtotime($post->created_at)) }}</small><br>
                                            <small>{{ $post->totalComments }} <i class="far fa-comment-dots"></i></small>
                                        </strong>
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    @include('web.parts.fb._page')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function loadmoreCasualPosts(e) {
            let casualContainer = document.querySelector('#casual');
            let totalPosts = casualContainer.querySelectorAll('.casual-posts').length;
            let category = e.getAttribute('data-category');
            axios.post('/categories/' + category + '/casual/' + totalPosts)
                .then((result) => {
                    casualContainer.innerHTML = casualContainer.innerHTML += result.data;
                    if (result.data == "") {
                        e.style.display = 'none';
                    }
                }).catch((err) => {
                    console.error(err);
                });
        }

        function loadmoreVideoPosts(e) {
            let videoContainer = document.querySelector('#video');
            let totalPosts = videoContainer.querySelectorAll('.video-posts').length;
            let category = e.getAttribute('data-category');
            axios.post('/categories/' + category + '/video/' + totalPosts)
                .then((result) => {
                    videoContainer.innerHTML = videoContainer.innerHTML += result.data;
                    if (result.data == "") {
                        e.style.display = 'none';
                    }
                }).catch((err) => {
                    console.error(err);
                });
        }
    </script>
@endpush
