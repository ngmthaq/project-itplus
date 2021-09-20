@extends('layouts.dashboard')

@section('title')
    Thêm hình ảnh | The Vietnam Newspaper | Trang thông tin - tin tức
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
                        <li>Thêm hình ảnh</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <form action="{{ route('admin.addImage') }}" method="post" class="media-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">
                                Chọn hình ảnh
                                <small class="required">*</small>
                            </label>
                            <input type="file" name="image[]" id="image" class="form-control-file" multiple>
                            <small class="required image-error">
                                @if ($errors->has('image'))
                                    @foreach ($errors->get('image') as $item)
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
                    <ul style="padding: 12px; background: #fff; border-radius: 2px;">
                        <h5>Lưu ý:</h5>
                        <li>Tệp tin là hình ảnh, có định dạng jpg, jpeg, jfif hoặc png</li>
                        <li>Độ lớn tệp tin không quá 3 MB</li>
                        <li>Chọn nhiều ảnh cùng lúc bằng cách giữ CTRL và chọn vào ảnh cần tải lên</li>
                        <li>Số lượng tệp tin càng lớn tốc độ tải càng chậm</li>
                        @if (session('image'))
                            <li class="required">Hình ảnh sau khi tải lên có thể bị ẩn một phần nhưng sẽ hiện đầy đủ trong bài viết</li>
                        @endif
                    </ul>
                </div>
            </div>
            @if (session('image'))
                <div class="row">
                    <h5 class="col-12">
                        <div class="padding-12">
                            <div class="label-container">
                                <span>Ảnh vừa tải lên</span>
                                <a href="{{ route('admin.mediaStore') }}" class="link">
                                    <small>Kho lưu trữ</small>
                                </a>
                            </div>
                        </div>
                    </h5>
                </div>
                <div class="row no-gutters img-uploaded">
                    @foreach (session('image') as $image)
                        <div class="col-4">
                            <div class="media-container">
                                <img width="100%" src="{{ asset($image['path'] . '/' . $image['name']) }}" alt="ảnh">
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection

@push('js')
    <script>
        $(function() {
            $('form').submit(function(e) {
                $('.image-error').text('');
                let isValidate = true;
                if ($('#image').val() == "") {
                    isValidate = false;
                    $('.image-error').text('Không bỏ trống trường này');
                }
                if (!isValidate) {
                    e.preventDefault();
                }
            });
        })
    </script>
@endpush
