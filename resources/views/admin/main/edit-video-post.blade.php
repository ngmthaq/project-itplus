@extends('layouts.dashboard')

@section('title')
    Quản lý bài viết | The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@push('css')
    <style>
        .copy-button {
            position: absolute;
            width: 60%;
            height: 60%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.2);
            visibility: hidden;
            border-radius: 2px;
            z-index: 1;
        }

        .media-image:hover .copy-button {
            visibility: visible;
        }

        .media-video:hover .copy-button {
            visibility: visible;
        }

    </style>
@endpush

@section('content')
    <section class="dashboard-content">
        <div class="dashboard-container">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrum vi my-3">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li>Quản lý bài viết</li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li>Đăng bài</li>
                    </ul>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="padding-12">
                        <h5>Lưu ý</h5>
                        <ul>
                            <li>VD cho đường dẫn ảnh:
                                <i>https://i.pinimg.com/564x/2e/5b/92/2e5b9287665c03aa6ad808d439282c4e.jpg</i>
                            </li>
                            <li>VD cho đường dẫn video:
                                <i>http://127.0.0.1:8000/storage/videos/3c4ee14e63631bbbf1b61e347dcfe622.mp4</i>
                            </li>
                        </ul>
                    </div>
                    <div class="padding-12">
                        <form action="{{ route('post.editVideoPost', ['post' => $post->id]) }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <h5>Sửa bài viết</h5>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="category-id">Danh mục <small class="required">*</small></label>
                                    <select name="category_id" id="category-id" class="form-control">
                                        <option value="{{ $post->category->id }}">{{ $post->category->name_vi }}
                                        </option>
                                        @foreach ($categories as $category)
                                            @if ($post->category->id == $category->id)
                                                @continue
                                            @endif
                                            <option value="{{ $category->id }}">{{ $category->name_vi }}</option>
                                        @endforeach
                                    </select>
                                    <small class="required category-error">
                                        @if ($errors->has('category_id'))
                                            @foreach ($errors->get('category_id') as $message)
                                                {{ $message }} <br>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-6">
                                    <label for="cover-url">Ảnh bìa <small class="required">*</small></label>
                                    <input type="text" name="cover_url" id="cover-url" class="form-control"
                                        placeholder="VD: domainexample.com/image-name.png" value="{{ $post->cover_url }}">
                                    <small class="required cover-url-error">
                                        @if ($errors->has('cover_url'))
                                            @foreach ($errors->get('cover_url') as $message)
                                                {{ $message }} <br>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="title-vi">Tiêu đề <small class="required">*</small></label>
                                    <textarea name="title_vi" id="title-vi" cols="30" rows="2"
                                        class="form-control">{{ $post->title_vi }}</textarea>
                                    <small class="required title-vi-error">
                                        @if ($errors->has('title_vi'))
                                            @foreach ($errors->get('title_vi') as $message)
                                                {{ $message }} <br>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-12">
                                    <label for="title-vi">Tiêu đề phụ <small class="required">*</small></label>
                                    <textarea name="subtitle_vi" id="subtitle-vi" cols="30" rows="4"
                                        class="form-control">{{ $post->subtitle_vi }}</textarea>
                                    <small class="required subtitle-vi-error">
                                        @if ($errors->has('subtitle_vi'))
                                            @foreach ($errors->get('subtitle_vi') as $message)
                                                {{ $message }} <br>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="content-vi">Đường dẫn video <small class="required">*</small></label>
                                    <textarea name="content_vi" id="content-vi" cols="30" rows="1"
                                        class="form-control">{{ $post->content_vi }}</textarea>
                                    <small class="required content-vi-error">
                                        @if ($errors->has('content_vi'))
                                            @foreach ($errors->get('content_vi') as $message)
                                                {{ $message }} <br>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <video controls muted width="100%" height="100%">
                                        <source src="{{ $post->content_vi }}" type="video/mp4">
                                    </video>
                                </div>
                                <div class="form-group col-12">
                                    <a href="javascript:void(0)" onclick="location.reload();">
                                        Nhấn vào đây nếu không hiển thị video
                                    </a>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <button type="submit" class="button-md-main">Sửa bài</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row no-gutters mb-3">
                <div class="col-12 image-dropdown-button">
                    <div class="padding-12 label-container">
                        <h5>Kho lưu trữ ảnh</h5>
                        <span><i class="fas fa-chevron-down"></i></span>
                    </div>
                </div>
                @foreach ($images as $image)
                    <div class="col-4 image-dropdown">
                        <div style="max-height: 630px;">
                            <div class="media-container media-image" style="position: relative;">
                                <div class="copy-button">
                                    <button class="button-md-main"
                                        data-url="{{ asset($image->media_path . '/' . $image->media_name) }}">
                                        Copy
                                    </button>
                                </div>
                                <img width="100%" src="{{ asset($image->media_path . '/' . $image->media_name) }}"
                                    alt="ảnh">
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12 mt-3 video-dropdown-button">
                    <div class="padding-12 label-container">
                        <h5>Kho lưu trữ video</h5>
                        <span><i class="fas fa-chevron-down"></i></span>
                    </div>
                </div>
                @foreach ($videos as $video)
                    <div class="col-4 video-dropdown">
                        <div style="max-height: 666px;">
                            <div class="media-container media-video" style="position: relative;">
                                <div class="copy-button">
                                    <button class="button-md-main"
                                        data-url="{{ asset($video->media_path . '/' . $video->media_name) }}">
                                        Copy
                                    </button>
                                </div>
                                <video class="video-sample" src="{{ asset($video->media_path . '/' . $video->media_name) }}" controls></video>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        $(function() {
            // Dropdown
            $('.image-dropdown-button').click(function() {
                $('.image-dropdown').slideToggle();
            })
            $('.video-dropdown-button').click(function() {
                $('.video-dropdown').slideToggle();
            })

            // Video handle
            // $('#content-vi').change(function() {
            //     let src = $(this).val();
            //     console.log(src);
            //     $('.video-sample').attr('src', src);
            // })

            // Copy link
            $('.copy-button button').click(function() {
                console.log($(this));
                navigator.clipboard.writeText($(this).attr('data-url'));
                $(this).text('Copied');
                $(this).removeClass('button-md-main');
                $(this).addClass('btn btn-sm btn-primary');
                setTimeout(() => {
                    $(this).text('Copy');
                    $(this).addClass('button-md-main');
                    $(this).removeClass('btn btn-sm btn-primary');
                }, 2000);
            })

            function trimValue(element) {
                $(element).val($.trim($(element).val()))
            }

            // Validate image url
            function imageUrlValidate(value) {
                const REGEX = /^((http:\/\/)|(https:\/\/))(.+)\.((png)|(jpeg)|(jpg)|(jfif))$/;
                return REGEX.test(value);
            }

            function videoUrlValidate(value) {
                const REGEX = /^((http:\/\/)|(https:\/\/))(.+)\.(mp4)$/;
                return REGEX.test(value);
            }

            $('form').submit(function(e) {
                // Reset
                let coverUrl = $.trim($('#cover-url').val());
                let titleVi = $.trim($('#title-vi').val());
                let subtitleVi = $.trim($('#subtitle-vi').val());
                let contentVi = $.trim($('#content-vi').val());
                trimValue($('#cover-url'));
                trimValue($('#title-vi'));
                trimValue($('#subtitle-vi'));
                trimValue($('#content-vi'));
                $('.category-error').text("");
                $('.cover-url-error').text("");
                $('.title-vi-error').text("");
                $('.subtitle-vi-error').text("");
                $('.content-vi-error').text("");

                // Messages
                let messages = [
                    'Vui lòng không để trống mục này',
                    'Vui lòng nhập đúng định dạng đường dẫn ảnh',
                    'Vui lòng nhập đúng định dạng đường dẫn video',
                ];

                // Validate
                let isValidated = true;
                if ($('#category-id').val() == "") {
                    isValidated = false;
                    $('.category-error').text(messages[0]);
                }

                if (coverUrl == "") {
                    isValidated = false;
                    $('.cover-url-error').text(messages[0]);
                } else {
                    if (!imageUrlValidate(coverUrl)) {
                        isValidated = false;
                        $('.cover-url-error').text(messages[1]);
                    }
                }

                if (titleVi == "") {
                    isValidated = false;
                    $('.title-vi-error').text(messages[0]);
                }

                if (subtitleVi == "") {
                    isValidated = false;
                    $('.subtitle-vi-error').text(messages[0]);
                }

                if (contentVi == "") {
                    isValidated = false;
                    $('.content-vi-error').text(messages[0]);
                } else {
                    if (!videoUrlValidate(contentVi)) {
                        isValidated = false;
                        $('.content-vi-error').text(messages[2]);
                    }
                }

                if (!isValidated) {
                    e.preventDefault();
                }
            });
        })
    </script>
@endpush
