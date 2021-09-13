@extends('layouts.master')

@section('title')
    Đăng nhập | Newspaper | Trang thông tin - tin tức
@endsection

@section('content')
    <div class="container">
        <ul class="breadcrum vi">
            <li><a href="/">Trang chủ</a></li>
            <li><i class="fas fa-angle-right"></i></li>
            <li>Đăng nhập</li>
        </ul>
    </div>
    <div class="login container">
        <div class="row">
            <div class="col-lg-6">
                <form action="">
                    <div class="form-group">
                        <h2 class="vi">Đăng nhập</h2>
                    </div>
                    <div class="form-group">
                        <label for="email">Email <small class="required">*</small></label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="label-container">
                            <label class="vi" for="password">Mật khẩu <small class="required">*</small></label>
                            <label class="vi"><a href="#">Quên mật khẩu?</a></label>
                        </div>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="label-container">
                            <button class="vi button-md-main" type="submit">Đăng nhập</button>
                            <label><a href="#">Đăng ký tài khoản?</a></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .login form {
            padding: 50px 0;
        }
    </style>
@endpush

@push('js')

@endpush
