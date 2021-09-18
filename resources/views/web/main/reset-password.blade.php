@extends('layouts.master')

@section('title')
    Đặt lại mật khẩu | The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@section('content')
    <div class="container">
        <ul class="breadcrum vi">
            <li><a href="/">Trang chủ</a></li>
            <li><i class="fas fa-angle-right"></i></li>
            <li>Đặt lại mật khẩu</li>
        </ul>
    </div>
    <div class="login container">
        <div class="row">
            <div class="col-lg-6">
                <form class="login-form" action="{{ route('user.resetPassword', ['user' => $user]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <h2 class="vi">Đặt lại mật khẩu</h2>
                    </div>
                    <div class="form-group">
                        <div class="label-container">
                            <label class="vi" for="new-password">
                                Mật khẩu mới
                                <small class="required">*</small>
                            </label>
                        </div>
                        <input type="password" name="new_password" id="new-password" class="form-control">
                        <small class="new-password-error required">
                            @if ($errors->has('new_password'))
                                @foreach ($errors->get('new_password') as $item)
                                    {{ $item }} <br>
                                @endforeach
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <div class="label-container">
                            <label class="vi" for="confirm-password">
                                Nhập lại mật khẩu
                                <small class="required">*</small>
                            </label>
                        </div>
                        <input type="password" name="confirm_password" id="confirm-password" class="form-control">
                        <small class="confirm-password-error required">
                            @if ($errors->has('confirm_password'))
                                @foreach ($errors->get('confirm_password') as $item)
                                    {{ $item }} <br>
                                @endforeach
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
            // Password validate: Có ít nhất 8 số, có tối thiểu 1 chữ và 1 số
            function validatePassword(password) {
                const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
                return regex.test(password)
            }

            // Change password validate
            $('form.login-form').submit(function(e) {
                // Reset
                $('small.new-password-error').text("");
                $('small.confirm-password-error').text("");
                $('input#new-password').val($.trim($('input#new-password').val()));
                $('input#confirm-password').val($.trim($('input#confirm-password').val()));

                // Messages
                let passwordErr = [
                    'Mật khẩu có ít nhất 8 kí tự, có tối thiểu 1 chữ và 1 số',
                    'Mật khẩu bạn nhập không trùng khớp',
                ];

                // Validate
                let isValidated = true;
                if (!validatePassword($('input#new-password').val())) {
                    isValidated = false;
                    $('small.new-password-error').text(passwordErr[0]);
                    $('small.new-password-error').addClass('required');
                }
                if (!validatePassword($('input#confirm-password').val())) {
                    isValidated = false;
                    $('small.confirm-password-error').text(passwordErr[0]);
                    $('small.confirm-password-error').addClass('required');
                }
                if ($('input#new-password').val() != $('input#confirm-password').val()) {
                    isValidated = false;
                    $('small.confirm-password-error').text(passwordErr[1]);
                    $('small.confirm-password-error').addClass('required');
                }

                if (!isValidated) {
                    e.preventDefault();
                }
            });
        })
    </script>
@endpush
