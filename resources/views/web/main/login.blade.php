@extends('layouts.master')

@section('title')
    Đăng nhập | The Vietnam Newspaper | Trang thông tin - tin tức
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
                <form class="login-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <h2 class="vi">Đăng nhập</h2>
                    </div>
                    <div class="form-group">
                        <label for="email">
                            Email
                            <small class="required">*</small>
                        </label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}"
                            placeholder="VD: dodaitoithieu6kytu@emaildomain.com">
                        <small class="required email-error">
                            @if ($errors->has('email'))
                                @foreach ($errors->get('email') as $item)
                                    {{ $item }} <br>
                                @endforeach
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <div class="label-container">
                            <label class="vi" for="password">
                                Mật khẩu
                                <small class="required">*</small>
                            </label>
                            <label class="vi"><a href="{{ route('user.getEmail') }}">Quên mật
                                    khẩu?</a></label>
                        </div>
                        <input type="password" name="password" id="password" class="form-control">
                        <small class="password-error required">
                            @if ($errors->has('password'))
                                @foreach ($errors->get('password') as $item)
                                    {{ $item }} <br>
                                @endforeach
                            @endif
                            @if (session('login_error'))
                                {{ session('login_error') }}
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="remember-me" id="remember-me" class="form-check-input"
                                value="true">
                            <label for="remember-me" class="form-check-label user-select-none">Lưu đăng nhập</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label-container">
                            <button class="vi button-md-main" type="submit">Đăng nhập</button>
                            <label><a href="{{ route('register.show') }}">Đăng ký tài khoản?</a></label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="socialite-box d-flex flex-column align-items-center justify-content-start justify-content-lg-center h-100 mb-5 mb-lg-0">
                    <p class="mb-3">Hoặc đăng nhập bằng</p>
                    {{-- <a class="social-login facebook" href="{{ route('facebook.loginUsingFacebook') }}">
                        <span class="d-inline-block pr-3">
                            <i class="fab fa-facebook-f"></i>
                        </span>
                        Đăng nhập bằng Facebook
                    </a> --}}
                    <a class="social-login google" href="{{ route('google.loginUsingGoogle') }}">
                        <span class="d-inline-block pr-3 blue">
                            <i class="fab fa-google"></i>
                        </span>
                        Đăng nhập bằng Google
                    </a>
                    <a class="social-login github" href="{{ route('github.loginUsingGithub') }}">
                        <span class="d-inline-block pr-3">
                            <i class="fab fa-github"></i>
                        </span>
                        Đăng nhập bằng Github
                    </a>
                </div>
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
    <script>
        $(function() {
            // Email validate
            function validateEmail(email) {
                const regex =
                    /^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/;
                return regex.test(email);
            }

            // Password validate: Có ít nhất 8 số, có tối thiểu 1 chữ và 1 số
            function validatePassword(password) {
                const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
                return regex.test(password)
            }

            // Login validate
            $('form.login-form').submit(function(e) {
                // Reset
                $('small.email-error').text("");
                $('small.password-error').text("");
                $('input#email').val($.trim($('input#email').val()));
                $('input#password').val($.trim($('input#password').val()));

                let isValidated = true;
                let emailErr = [
                    'Vui lòng nhập đúng định dạng email và email có độ dài tên tối thiểu 6 kí tự',
                    'Vui lòng nhập email của bạn'
                ];
                let passwordErr = [
                    'Mật khẩu có ít nhất 8 kí tự, có tối thiểu 1 chữ và 1 số'
                ];
                if ($('input#email').val() == "") {
                    isValidated = false;
                    $('small.email-error').text(emailErr[1]);
                } else {
                    if (!validateEmail($('input#email').val())) {
                        isValidated = false;
                        $('small.email-error').text(emailErr[0]);
                    }
                }
                if (!validatePassword($('input#password').val())) {
                    isValidated = false;
                    $('small.password-error').text(passwordErr[0]);
                    $('small.password-error').addClass('required');
                }
                if (!isValidated) {
                    e.preventDefault();
                }
            });
        })
    </script>
@endpush
