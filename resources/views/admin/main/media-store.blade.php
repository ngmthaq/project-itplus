@extends('layouts.dashboard')

@section('title')
    Kho lưu trữ | The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@push('css')

@endpush

@section('content')
    @include('admin.parts._media-modal')
    <section class="dashboard-content">
        <div class="dashboard-container">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrum vi my-3">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li>Quản lý đa phương tiện</li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li>Kho lưu trữ</li>
                    </ul>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <div class="count-record">
                        <div class="count-record-icon">
                            <i class="far fa-images"></i>
                        </div>
                        <div class="count-record-content">
                            <h5>{{ count($images) }}</h5>
                            <p>Hình ảnh</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="count-record">
                        <div class="count-record-icon">
                            <i class="fas fa-video"></i>
                        </div>
                        <div class="count-record-content">
                            <h5>{{ count($videos) }}</h5>
                            <p>Video</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="count-record">
                        <div class="count-record-icon">
                            <i class="fas fa-camera-retro"></i>
                        </div>
                        <div class="count-record-content">
                            <h5>{{ count($images) + count($videos) }}</h5>
                            <p>Tổng</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 image-dropdown-button">
                    <div class="label-container padding-12">
                        <span>Hình ảnh</span>
                        <span><i class="fas fa-chevron-down"></i></span>
                    </div>
                </div>
            </div>
            <div class="image-dropdown">
                <div class="row mb-3 no-gutters img-uploaded">
                    @foreach ($images as $image)
                        <div class="col-4">
                            <div class="media-container media-image">
                                <img width="100%" src="{{ asset($image->media_path . '/' . $image->media_name) }}"
                                    alt="ảnh">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 video-dropdown-button">
                    <div class="label-container padding-12">
                        <span>Video</span>
                        <span><i class="fas fa-chevron-down"></i></span>
                    </div>
                </div>
            </div>
            <div class="video-dropdown">
                <div class="row mb-3 no-gutters">
                    @foreach ($videos as $video)
                        <div class="col-4">
                            <div class="media-container media-video">
                                <video src="{{ asset($video->media_path . '/' . $video->media_name) }}"></video>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        $(function() {
            // Copy link
            $('#media-link-button').click(function() {
                $('#media-link').select();
                navigator.clipboard.writeText($('#media-link').val());
                $(this).html('<i class="fas fa-clipboard-check"></i>');
                setTimeout(() => {
                    $('#media-link-button').html('<i class="far fa-clipboard"></i>')
                }, 2000);
            })

            // Dropdown
            $('.image-dropdown-button').click(function() {
                $('.image-dropdown').slideToggle();
            })
            $('.video-dropdown-button').click(function() {
                $('.video-dropdown').slideToggle();
            })

            // Modal
            $('.media-image').click(function() {
                let media = $(this).children();
                let src = $(media).attr('src');
                $('.media-content').find('img').show();
                $('.media-content').find('img').attr('src', src);
                $('.media-content').find('video').hide();
                $('.my-modal').show();
                $('.media-modal').show();
                $('body').css('overflowY', 'hidden');
                $('.media-modal').find('#media-link').val(src)
            });
            $('.media-video').click(function() {
                let media = $(this).children();
                let src = $(media).attr('src');
                $('.media-content').find('video').show();
                $('.media-content').find('video').attr('src', src);
                $('.media-content').find('img').hide();
                $('.my-modal').show();
                $('.media-modal').show();
                $('body').css('overflowY', 'hidden');
                $('.media-modal').find('#media-link').val(src)
            });
            $('.close').click(function() {
                $('.my-modal').hide();
                $('.media-modal').hide();
                $('.media-content').find('video').attr('src', '');
                $('body').css('overflowY', 'scroll');
            })
            $('.my-modal').click(function() {
                $(this).hide();
                $('.media-modal').hide();
                $('.media-content').find('video').attr('src', '');
                $('body').css('overflowY', 'scroll');
            })
            $(window).keydown(function(e) {
                if (e.which == 27) {
                    $('.my-modal').hide();
                    $('.media-modal').hide();
                    $('.media-content').find('video').attr('src', '');
                    $('body').css('overflowY', 'scroll');
                }
            });
        })
    </script>
@endpush
