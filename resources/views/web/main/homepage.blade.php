@extends('layouts.master')

@section('title')
    The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@section('content')
    <section class="container split-header">
        <div class="row mb-3">
            <div class="col-6">
                <div class="owl-carousel owl-theme">
                    @foreach ($firstSliders as $slider)
                        <div class="item">
                            <small class="category-name">
                                <a href="{{ route('category.showPosts', ['category' => $slider->category->id]) }}"
                                    class="text-light text-decoration-none">
                                    {{ $slider->category->name_vi }}
                                </a>
                                -
                                {{ $slider->type->name_vi }}
                            </small>
                            <div class="title-container">
                                <h5 class="title">
                                    <a href="#" class="link" title="{{ $slider->title_vi }}">
                                        {{ $slider->title_vi }}
                                    </a>
                                </h5>
                                <small class="text-dark">{{ date('d/m/Y', strtotime($slider->created_at)) }}</small>
                                <p class="subtitle" title="{{ $slider->subtitle_vi }}">{{ $slider->subtitle_vi }}
                                </p>
                            </div>
                            <img src="{{ asset($slider->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                        </div>
                    @endforeach
                </div>
            </div>
            @foreach ($videoPosts as $post)
                <div class="col-3">
                    <div class="item">
                        <small class="category-name">
                            <a href="{{ route('category.showPosts', ['category' => $post->category->id]) }}"
                                class="text-light text-decoration-none">
                                {{ $post->category->name_vi }}
                            </a>
                            -
                            {{ $post->type->name_vi }}
                        </small>
                        <div class="title-container">
                            <h5 class="title">
                                <a href="#" class="link" title="{{ $post->title_vi }}">
                                    {{ $post->title_vi }}
                                </a>
                            </h5>
                            <small>{{ date('d/m/Y', strtotime($post->created_at)) }}</small>
                            <p class="subtitle" title="{{ $post->subtitle_vi }}">{{ $post->subtitle_vi }}</p>
                        </div>
                        <img src="{{ asset($post->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                    </div>
                </div>
            @endforeach
        </div>
        {{-- Chính trị --}}
        <div class="row mb-3">
            <div class="col-9">
                <div class="categories-container politics">
                    <h5 class="bg-blue">
                        <a href="{{ route('category.showPosts', ['category' => $firstPolitic->category->id]) }}"
                            class="text-light text-decoration-none">
                            {{ $firstPolitic->category->name_vi }}
                        </a>
                    </h5>
                    <div class="row">
                        <div class="col-7 category-post-container">
                            <div class="item">
                                <small class="category-name">{{ $firstPolitic->type->name_vi }}</small>
                                <div class="title-container">
                                    <h5 class="title">
                                        <a href="#" class="link" title="{{ $firstPolitic->title_vi }}">
                                            {{ $firstPolitic->title_vi }}
                                        </a>
                                    </h5>
                                    <small>{{ date('d/m/Y', strtotime($firstPolitic->created_at)) }}</small>
                                    <p class="subtitle" title="{{ $firstPolitic->subtitle_vi }}">
                                        {{ $firstPolitic->subtitle_vi }}</p>
                                </div>
                                <img src="{{ asset($firstPolitic->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                            </div>
                        </div>
                        <div class="col-5">
                            @foreach ($politics as $post)
                                <div class="small-item" style="position: relative; flex: 1;">
                                    <small class="category-name">{{ $post->type->name_vi }}</small>
                                    <div class="img-container">
                                        <img src="{{ asset($post->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                                    </div>
                                    <div class="small-title-container">
                                        <p class="title">
                                            <strong>
                                                <a href="#" class="link" title="{{ $post->title_vi }}">
                                                    {{ $post->title_vi }}
                                                </a>
                                            </strong>
                                        </p>
                                        <small class="small-date">Đăng ngày
                                            {{ date('d/m/Y', strtotime($post->created_at)) }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 bg-light">
                <div class="categories-container">
                    <p class="title bg-secondary">Phổ biến - {{ $firstPolitic->category->name_vi }}</p>
                    @foreach ($politicTopComments as $post)
                        <div class="small-item" style="position: relative; flex: 1;">
                            <small class="category-name">{{ $post->type->name_vi }}</small>
                            <div class="img-container">
                                <img src="{{ asset($post->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                            </div>
                            <div class="small-title-container">
                                <p class="title">
                                    <strong>
                                        <a href="#" class="link" title="{{ $post->title_vi }}">
                                            {{ $post->title_vi }}
                                        </a>
                                    </strong>
                                </p>
                                <small class="small-date">
                                    {{ date('d/m/Y', strtotime($post->created_at)) }}
                                </small> <br>
                                <small class="small-date">
                                    {{ $post->totalComments }}
                                    <i class="far fa-comment-dots"></i>
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- Kinh doanh --}}
        <div class="row mb-3">
            <div class="col-9">
                <div class="categories-container politics">
                    <h5 class="bg-blue">
                        <a href="{{ route('category.showPosts', ['category' => $firstBusiness->category->id]) }}"
                            class="text-light text-decoration-none">
                            {{ $firstBusiness->category->name_vi }}
                        </a>
                    </h5>
                    <div class="row">
                        <div class="col-7 category-post-container">
                            <div class="item">
                                <small class="category-name">{{ $firstBusiness->type->name_vi }}</small>
                                <div class="title-container">
                                    <h5 class="title">
                                        <a href="#" class="link" title="{{ $firstBusiness->title_vi }}">
                                            {{ $firstBusiness->title_vi }}
                                        </a>
                                    </h5>
                                    <small>{{ date('d/m/Y', strtotime($firstBusiness->created_at)) }}</small>
                                    <p class="subtitle" title="{{ $firstBusiness->subtitle_vi }}">
                                        {{ $firstBusiness->subtitle_vi }}</p>
                                </div>
                                <img src="{{ asset($firstBusiness->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                            </div>
                        </div>
                        <div class="col-5">
                            @foreach ($business as $post)
                                <div class="small-item" style="position: relative; flex: 1;">
                                    <small class="category-name">{{ $post->type->name_vi }}</small>
                                    <div class="img-container">
                                        <img src="{{ asset($post->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                                    </div>
                                    <div class="small-title-container">
                                        <p class="title">
                                            <strong>
                                                <a href="#" class="link" title="{{ $post->title_vi }}">
                                                    {{ $post->title_vi }}
                                                </a>
                                            </strong>
                                        </p>
                                        <small class="small-date">Đăng ngày
                                            {{ date('d/m/Y', strtotime($post->created_at)) }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 bg-light">
                <div class="categories-container">
                    <p class="title bg-secondary">Phổ biến - {{ $firstBusiness->category->name_vi }}</p>
                    @foreach ($businessTopComments as $post)
                        <div class="small-item" style="position: relative; flex: 1;">
                            <small class="category-name">{{ $post->type->name_vi }}</small>
                            <div class="img-container">
                                <img src="{{ asset($post->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                            </div>
                            <div class="small-title-container">
                                <p class="title">
                                    <strong>
                                        <a href="#" class="link" title="{{ $post->title_vi }}">
                                            {{ $post->title_vi }}
                                        </a>
                                    </strong>
                                </p>
                                <small class="small-date">
                                    {{ date('d/m/Y', strtotime($post->created_at)) }}
                                </small> <br>
                                <small class="small-date">
                                    {{ $post->totalComments }}
                                    <i class="far fa-comment-dots"></i>
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- Khoa học và công nghệ --}}
        <div class="row mb-3">
            <div class="col-9">
                <div class="categories-container politics">
                    <h5 class="bg-blue">
                        <a href="{{ route('category.showPosts', ['category' => $firstSnT->category->id]) }}"
                            class="text-light text-decoration-none">
                            {{ $firstSnT->category->name_vi }}
                        </a>
                    </h5>
                    <div class="row">
                        <div class="col-7 category-post-container">
                            <div class="item">
                                <small class="category-name">{{ $firstSnT->type->name_vi }}</small>
                                <div class="title-container">
                                    <h5 class="title">
                                        <a href="#" class="link" title="{{ $firstSnT->title_vi }}">
                                            {{ $firstSnT->title_vi }}
                                        </a>
                                    </h5>
                                    <small>{{ date('d/m/Y', strtotime($firstSnT->created_at)) }}</small>
                                    <p class="subtitle" title="{{ $firstSnT->subtitle_vi }}">
                                        {{ $firstSnT->subtitle_vi }}</p>
                                </div>
                                <img src="{{ asset($firstSnT->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                            </div>
                        </div>
                        <div class="col-5">
                            @foreach ($SnTs as $post)
                                <div class="small-item" style="position: relative; flex: 1;">
                                    <small class="category-name">{{ $post->type->name_vi }}</small>
                                    <div class="img-container">
                                        <img src="{{ asset($post->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                                    </div>
                                    <div class="small-title-container">
                                        <p class="title">
                                            <strong>
                                                <a href="#" class="link" title="{{ $post->title_vi }}">
                                                    {{ $post->title_vi }}
                                                </a>
                                            </strong>
                                        </p>
                                        <small class="small-date">Đăng ngày
                                            {{ date('d/m/Y', strtotime($post->created_at)) }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 bg-light">
                <div class="categories-container">
                    <p class="title bg-secondary">Phổ biến - {{ $firstSnT->category->name_vi }}</p>
                    @foreach ($SnTTopComments as $post)
                        <div class="small-item" style="position: relative; flex: 1;">
                            <small class="category-name">{{ $post->type->name_vi }}</small>
                            <div class="img-container">
                                <img src="{{ asset($post->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                            </div>
                            <div class="small-title-container">
                                <p class="title">
                                    <strong>
                                        <a href="#" class="link" title="{{ $post->title_vi }}">
                                            {{ $post->title_vi }}
                                        </a>
                                    </strong>
                                </p>
                                <small class="small-date">
                                    {{ date('d/m/Y', strtotime($post->created_at)) }}
                                </small> <br>
                                <small class="small-date">
                                    {{ $post->totalComments }}
                                    <i class="far fa-comment-dots"></i>
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- Sức khoẻ và cộng đồng --}}
        <div class="row mb-3">
            <div class="col-9">
                <div class="categories-container politics">
                    <h5 class="bg-blue">
                        <a href="{{ route('category.showPosts', ['category' => $firstHnC->category->id]) }}"
                            class="text-light text-decoration-none">
                            {{ $firstHnC->category->name_vi }}
                        </a>
                    </h5>
                    <div class="row">
                        <div class="col-7 category-post-container">
                            <div class="item">
                                <small class="category-name">{{ $firstHnC->type->name_vi }}</small>
                                <div class="title-container">
                                    <h5 class="title">
                                        <a href="#" class="link" title="{{ $firstHnC->title_vi }}">
                                            {{ $firstHnC->title_vi }}
                                        </a>
                                    </h5>
                                    <small>{{ date('d/m/Y', strtotime($firstHnC->created_at)) }}</small>
                                    <p class="subtitle" title="{{ $firstHnC->subtitle_vi }}">
                                        {{ $firstHnC->subtitle_vi }}</p>
                                </div>
                                <img src="{{ asset($firstHnC->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                            </div>
                        </div>
                        <div class="col-5">
                            @foreach ($HnCs as $post)
                                <div class="small-item" style="position: relative; flex: 1;">
                                    <small class="category-name">{{ $post->type->name_vi }}</small>
                                    <div class="img-container">
                                        <img src="{{ asset($post->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                                    </div>
                                    <div class="small-title-container">
                                        <p class="title">
                                            <strong>
                                                <a href="#" class="link" title="{{ $post->title_vi }}">
                                                    {{ $post->title_vi }}
                                                </a>
                                            </strong>
                                        </p>
                                        <small class="small-date">Đăng ngày
                                            {{ date('d/m/Y', strtotime($post->created_at)) }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 bg-light">
                <div class="categories-container">
                    <p class="title bg-secondary">Phổ biến - {{ $firstHnC->category->name_vi }}</p>
                    @foreach ($HnCTopComments as $post)
                        <div class="small-item" style="position: relative; flex: 1;">
                            <small class="category-name">{{ $post->type->name_vi }}</small>
                            <div class="img-container">
                                <img src="{{ asset($post->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                            </div>
                            <div class="small-title-container">
                                <p class="title">
                                    <strong>
                                        <a href="#" class="link" title="{{ $post->title_vi }}">
                                            {{ $post->title_vi }}
                                        </a>
                                    </strong>
                                </p>
                                <small class="small-date">
                                    {{ date('d/m/Y', strtotime($post->created_at)) }}
                                </small> <br>
                                <small class="small-date">
                                    {{ $post->totalComments }}
                                    <i class="far fa-comment-dots"></i>
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- Du lịch --}}
        <div class="row mb-3">
            <div class="col-9">
                <div class="categories-container politics">
                    <h5 class="bg-blue">
                        <a href="{{ route('category.showPosts', ['category' => $firstTravel->category->id]) }}"
                            class="text-light text-decoration-none">
                            {{ $firstTravel->category->name_vi }}
                        </a>
                    </h5>
                    <div class="row">
                        <div class="col-7 category-post-container">
                            <div class="item">
                                <small class="category-name">{{ $firstTravel->type->name_vi }}</small>
                                <div class="title-container">
                                    <h5 class="title">
                                        <a href="#" class="link" title="{{ $firstTravel->title_vi }}">
                                            {{ $firstTravel->title_vi }}
                                        </a>
                                    </h5>
                                    <small>{{ date('d/m/Y', strtotime($firstTravel->created_at)) }}</small>
                                    <p class="subtitle" title="{{ $firstTravel->subtitle_vi }}">
                                        {{ $firstTravel->subtitle_vi }}</p>
                                </div>
                                <img src="{{ asset($firstTravel->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                            </div>
                        </div>
                        <div class="col-5">
                            @foreach ($travels as $post)
                                <div class="small-item" style="position: relative; flex: 1;">
                                    <small class="category-name">{{ $post->type->name_vi }}</small>
                                    <div class="img-container">
                                        <img src="{{ asset($post->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                                    </div>
                                    <div class="small-title-container">
                                        <p class="title">
                                            <strong>
                                                <a href="#" class="link" title="{{ $post->title_vi }}">
                                                    {{ $post->title_vi }}
                                                </a>
                                            </strong>
                                        </p>
                                        <small class="small-date">Đăng ngày
                                            {{ date('d/m/Y', strtotime($post->created_at)) }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 bg-light">
                <div class="categories-container">
                    <p class="title bg-secondary">Phổ biến - {{ $firstTravel->category->name_vi }}</p>
                    @foreach ($travelTopComments as $post)
                        <div class="small-item" style="position: relative; flex: 1;">
                            <small class="category-name">{{ $post->type->name_vi }}</small>
                            <div class="img-container">
                                <img src="{{ asset($post->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                            </div>
                            <div class="small-title-container">
                                <p class="title">
                                    <strong>
                                        <a href="#" class="link" title="{{ $post->title_vi }}">
                                            {{ $post->title_vi }}
                                        </a>
                                    </strong>
                                </p>
                                <small class="small-date">
                                    {{ date('d/m/Y', strtotime($post->created_at)) }}
                                </small> <br>
                                <small class="small-date">
                                    {{ $post->totalComments }}
                                    <i class="far fa-comment-dots"></i>
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- Thể thao --}}
        <div class="row mb-5">
            <div class="col-9">
                <div class="categories-container politics">
                    <h5 class="bg-blue">
                        <a href="{{ route('category.showPosts', ['category' => $firstSport->category->id]) }}"
                            class="text-light text-decoration-none">
                            {{ $firstSport->category->name_vi }}
                        </a>
                    </h5>
                    <div class="row">
                        <div class="col-7 category-post-container">
                            <div class="item">
                                <small class="category-name">{{ $firstSport->type->name_vi }}</small>
                                <div class="title-container">
                                    <h5 class="title">
                                        <a href="#" class="link" title="{{ $firstSport->title_vi }}">
                                            {{ $firstSport->title_vi }}
                                        </a>
                                    </h5>
                                    <small>{{ date('d/m/Y', strtotime($firstSport->created_at)) }}</small>
                                    <p class="subtitle" title="{{ $firstSport->subtitle_vi }}">
                                        {{ $firstSport->subtitle_vi }}</p>
                                </div>
                                <img src="{{ asset($firstSport->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                            </div>
                        </div>
                        <div class="col-5">
                            @foreach ($sports as $post)
                                <div class="small-item" style="position: relative; flex: 1;">
                                    <small class="category-name">{{ $post->type->name_vi }}</small>
                                    <div class="img-container">
                                        <img src="{{ asset($post->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                                    </div>
                                    <div class="small-title-container">
                                        <p class="title">
                                            <strong>
                                                <a href="#" class="link" title="{{ $post->title_vi }}">
                                                    {{ $post->title_vi }}
                                                </a>
                                            </strong>
                                        </p>
                                        <small class="small-date">Đăng ngày
                                            {{ date('d/m/Y', strtotime($post->created_at)) }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 bg-light">
                <div class="categories-container">
                    <p class="title bg-secondary">Phổ biến - {{ $firstSport->category->name_vi }}</p>
                    @foreach ($sportTopComments as $post)
                        <div class="small-item" style="position: relative; flex: 1;">
                            <small class="category-name">{{ $post->type->name_vi }}</small>
                            <div class="img-container">
                                <img src="{{ asset($post->cover_url) }}" alt="Ảnh" width="100%" height="100%">
                            </div>
                            <div class="small-title-container">
                                <p class="title">
                                    <strong>
                                        <a href="#" class="link" title="{{ $post->title_vi }}">
                                            {{ $post->title_vi }}
                                        </a>
                                    </strong>
                                </p>
                                <small class="small-date">
                                    {{ date('d/m/Y', strtotime($post->created_at)) }}
                                </small> <br>
                                <small class="small-date">
                                    {{ $post->totalComments }}
                                    <i class="far fa-comment-dots"></i>
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
    <style>
        .categories-container {
            background: #fff;
            padding: 16px 0;
        }

        .categories-container>.title,
        .categories-container>h5 {
            margin-bottom: 24px;
            padding: 8px 12px;
            background-color: var(--main-color);
            color: #fff;
            display: inline-block;
        }

        .category-post-container {
            min-height: 500px;
        }

        .small-item {
            display: flex;
            height: calc(500px / 4);
            margin-bottom: 2px
        }

        .small-title-container {
            flex: 1;
        }

        .small-date {
            padding: 0 6px;
        }

        .img-container {
            margin-right: 8px;
            flex: 1;
            object-fit: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .img-container img {
            object-fit: cover;
        }

        .item {
            height: 500px;
            -o-object-fit: cover;
            object-fit: cover;
            z-index: 0;
            position: relative;
        }

        .title-container {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            background: #fff;
            width: 90%;
            height: 30%;
            text-align: center;
        }

        .title-container .title {
            color: #000;
            padding: 12px 6px 6px;
            height: 60px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            font-weight: 600;
            font-size: 18px;
        }

        .small-title-container .title,
        .title-container .subtitle {
            color: #000;
            padding: 0 6px;
            height: 50px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        img {
            -o-object-fit: cover;
            object-fit: cover;
        }

        .owl-dots {
            display: none;
        }

        .owl-carousel {
            position: relative;
            border-radius: 2px;
        }

        .owl-nav {
            position: absolute;
            top: 0;
            right: 10px;
            background: #fff;
            border-radius: 5px;
        }

        .owl-nav>.owl-prev,
        .owl-nav>.owl-next {
            width: 30px;
            height: 30px;
        }

        .category-name {
            position: absolute;
            top: 0;
            left: 0;
            display: inline-block;
            background: var(--main-color);
            padding: 2px 4px;
            color: #fff;
        }

    </style>
@endpush

@push('js')
    <script>
        $(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        })
    </script>
@endpush
