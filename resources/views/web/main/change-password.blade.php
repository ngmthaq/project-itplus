@extends('layouts.master')

@section('title')
    Thay đổi mật khẩu | The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@section('content')
    <div class="container">
        <ul class="breadcrum vi">
            <li><a href="/">Trang chủ</a></li>
            <li><i class="fas fa-angle-right"></i></li>
            <li>Thay đổi mật khẩu</li>
        </ul>
    </div>
    <div class="login container">
        <div class="row">
            <div class="col-lg-6">
                <form class="login-form" action="{{ route('user.changePassword') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <h2 class="vi">Thay đổi mật khẩu</h2>
                    </div>
                    <div class="form-group">
                        <div class="label-container">
                            <label class="vi" for="old-password">
                                Mật khẩu cũ
                                <small class="required">*</small>
                            </label>
                            <label class="vi"><a href="#">Quên mật khẩu?</a></label>
                        </div>
                        <input type="password" name="old_password" id="old-password" class="form-control">
                        <small class="old-password-error required">
                            @if ($errors->has('old_password'))
                                @foreach ($errors->get('old_password') as $item)
                                    {{ $item }} <br>
                                @endforeach
                            @endif
                            @if (session('incorrect_password'))
                                {{ session('incorrect_password') }}
                            @endif
                        </small>
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
                            <button class="vi button-md-main" type="submit">Đổi mật khẩu</button>
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
                $('small.old-password-error').text("");
                $('small.new-password-error').text("");
                $('small.confirm-password-error').text("");

                // Messages
                let passwordErr = [
                    'Mật khẩu có ít nhất 8 kí tự, có tối thiểu 1 chữ và 1 số',
                    'Mật khẩu bạn nhập không trùng khớp',
                    'Mật khẩu mới không được trùng với mật khẩu cũ'
                ];

                // Validate
                let isValidated = true;
                if (!validatePassword($('input#old-password').val())) {
                    isValidated = false;
                    $('small.old-password-error').text(passwordErr[0]);
                    $('small.old-password-error').addClass('required');
                }
                if ($('input#old-password').val() == $('input#new-password').val()) {
                    isValidated = false;
                    $('small.new-password-error').text(passwordErr[2]);
                    $('small.new-password-error').addClass('required');
                }
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
