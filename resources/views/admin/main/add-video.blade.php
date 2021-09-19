@extends('layouts.dashboard')

@section('title')
    Thêm video | The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@push('css')

@endpush

@section('content')
    <section class="dashboard-content">
        <div class="dashboard-container">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrum vi my-3">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li>Quản lý đa phương tiện</li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li>Thêm video</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <form action="{{ route('admin.addVideo') }}" method="post" class="media-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="video">
                                Chọn video
                                <small class="required">*</small>
                            </label>
                            <input type="file" name="video" id="video" class="form-control-file">
                            <small class="required video-error">
                                @if ($errors->has('video'))
                                    @foreach ($errors->get('video') as $item)
                                        {{ $item }} <br>
                                    @endforeach
                                @endif
                                @if (session('file_error'))
                                    {{ session('file_error') }}
                                @endif
                            </small>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button-md-main">Thêm</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 mb-3">
                    <ul style="padding: 12px; background: #fff;">
                        <h5>Lưu ý:</h5>
                        <li>Tệp tin là video, có định dạng mp4</li>
                    </ul>
                </div>
            </div>
            @if (session('video'))
                <div class="row">
                    <h5 class="col-12">
                        <div class="media-container">
                            <div class="label-container">
                                <span>Video vừa tải lên</span>
                                <a href="{{ route('admin.mediaStore') }}" class="link">
                                    <small>Kho lưu trữ</small>
                                </a>
                            </div>
                        </div>
                    </h5>
                    <div class="col-12">
                        <div class="media-container">
                            <video src="{{ asset(session('video')['path'] . '/' . session('video')['name']) }}" muted controls></video>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('js')
    <script>
        $(function() {
            $('form').submit(function(e) {
                $('.video-error').text('');
                let isValidate = true;
                if ($('#video').val() == "") {
                    isValidate = false;
                    $('.video-error').text('Không bỏ trống trường này');
                }
                if (!isValidate) {
                    e.preventDefault();
                }
            });
        })
    </script>
@endpush
