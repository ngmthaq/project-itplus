@extends('layouts.master')

@section('title')
    Tin mới | Breaking news | The Vietnam Newspaper | Trang thông tin - tin tức
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
            margin-top: 12px;
        }

        .content-container .subtitle {
            height: 100px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 4;
            margin-bottom: 12px;
        }

    </style>
@endpush

@section('content')
    <section class="container split-header">
        <div class="row mb-3">
            <div class="col-12">
                <ul class="breadcrum vi mt-0">
                    <li><a href="/">Trang chủ</a></li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>Tin mới</li>
                </ul>
            </div>
        </div>
        <div class="row mb-3" id="posts">
            <div class="col-12 my-3">
                <h5>TIN MỚI</h5>
            </div>
            @foreach ($posts as $post)
                <div class="col-4">
                    <div class="post-container mb-3">
                        <small class="category-type">
                            {{ $post->category->name_vi }} - {{ $post->type->name_vi }}
                        </small>
                        <div class="img-container">
                            <img src="{{ $post->cover_url }}" alt="{{ $post->cover_url }}" width="100%" height="100%">
                        </div>
                        <div class="content-container">
                            <h5 class="title" title="{{ $post->title_vi }}">
                                <a href="{{ route('post.showPostDetail', ['post' => $post->id]) }}"
                                    class="link">{{ $post->title_vi }}</a>
                            </h5>
                            <p class="subtitle" title="{{ $post->subtitle_vi }}">{{ $post->subtitle_vi }}</p>
                            <small class="mb-2 d-block">Đăng bài:
                                {{ date('d/m/Y', strtotime($post->created_at)) }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mb-5 button-container">
            <div class="col-12 text-center">
                <button class="btn btn-outline-info" onclick="loadmore(this)">XEM THÊM</button>
                <button class="btn btn-outline-info" style="display: none;">Đang tải...</button>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        function loadmore(e) {
            let totalPost = document.querySelectorAll('.post-container').length;
            e.style.display = 'none';
            e.nextElementSibling.style.display = 'inline-block';
            setTimeout(() => {
                axios.post('/breaking-news/' + totalPost)
                    .then((result) => {
                        let postParent = document.querySelector('#posts');
                        postParent.innerHTML = postParent.innerHTML += result.data;
                        e.style.display = 'inline-block';
                        e.nextElementSibling.style.display = 'none';
                        if (result.data == "") {
                            document.querySelector('.button-container').style.display = "none";
                        }
                    }).catch((err) => {
                        console.error(err);
                    });
            }, 100);
        }
    </script>
@endpush
