@extends('layouts.master')

@section('title')
    Quên mật khẩu | The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@section('content')
    <div class="container">
        <ul class="breadcrum vi">
            <li><a href="/">Trang chủ</a></li>
            <li><i class="fas fa-angle-right"></i></li>
            <li>Quên mật khẩu</li>
        </ul>
    </div>
    <div class="login container">
        <div class="row">
            <div class="col-lg-6">
                <form class="login-form" action="{{ route('user.sendEmail') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <h2 class="vi">Quên mật khẩu</h2>
                    </div>
                    <div class="form-group">
                        <label for="email">
                            Email
                            <small class="required">*</small>
                        </label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}"
                            placeholder="VD: emailcuaban@emaildomain.com">
                        <small>Nhập email của bạn để nhận đường dẫn đặt lại mật khẩu</small><br>
                        <small class="required email-error">
                            @if ($errors->has('email'))
                                Vui lòng nhập email có độ dài tên tối thiểu 6 kí tự
                            @endif
                            @if (session('invalid_email'))
                                {{ session('invalid_email') }}
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <div class="label-container">
                            <button class="vi button-md-main" type="submit">Xác nhận</button>
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
    <script>
        $(function() {
            // Email validate
            function validateEmail(email) {
                const regex =
                    /^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/;
                return regex.test(email);
            }

            // Form validate
            $('form.login-form').submit(function(e) {
                // Reset
                $('small.email-error').text("");

                let isValidated = true;
                let emailErr = [
                    'Vui lòng nhập email có độ dài tên tối thiểu 6 kí tự',
                ];
                if (!validateEmail($('input#email').val())) {
                    isValidated = false;
                    $('small.email-error').text(emailErr[0]);
                }
                if (!isValidated) {
                    e.preventDefault();
                }
            });
        })
    </script>
@endpush
