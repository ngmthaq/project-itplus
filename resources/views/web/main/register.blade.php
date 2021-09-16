@extends('layouts.master')

@section('title')
    Đăng ký | The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@section('content')
    <div class="container">
        <ul class="breadcrum vi">
            <li><a href="/">Trang chủ</a></li>
            <li><i class="fas fa-angle-right"></i></li>
            <li>Đăng ký</li>
        </ul>
    </div>
    <div class="login container">
        <div class="row">
            <div class="col-lg-8">
                <form action="{{ route('register') }}" class="register-form" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <h2>Đăng ký</h2>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label for="first-name">
                                Họ
                                <small class="required">*</small>
                            </label>
                            <input type="text" name="first_name" id="first-name" class="form-control"
                                placeholder="VD: Nguyễn" value="{{ old('first_name') }}">
                            <small class="first-name-error required">
                                @if ($errors->has('first_name'))
                                    @foreach ($errors->get('first_name') as $item)
                                        {{ $item }} <br>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="last-name">
                                Tên
                                <small class="required">*</small>
                            </label>
                            <input type="text" name="last_name" id="last-name" class="form-control"
                                placeholder="VD: Văn A" value="{{ old('last_name') }}">
                            <small class="last-name-error required">
                                @if ($errors->has('last_name'))
                                    @foreach ($errors->get('last_name') as $item)
                                        {{ $item }} <br>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="is-male">
                                Giới tính
                                <small class="required">*</small>
                            </label>
                            <select name="is_male" id="is-male" class="form-control">
                                <option value="">Chọn giới tính...</option>
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                            </select>
                            <small class="gender-error required">
                                @if ($errors->has('is_male'))
                                    @foreach ($errors->get('is_male') as $item)
                                        {{ $item }} <br>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="dob">
                                Ngày sinh
                                <small class="required">*</small>
                            </label>
                            <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob') }}">
                            <small class="dob-error required">
                                @if ($errors->has('dob'))
                                    @foreach ($errors->get('dob') as $item)
                                        {{ $item }} <br>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label for="email">
                                Email
                                <small class="required">*</small>
                            </label>
                            <input type="text" name="email" id="email" class="form-control"
                                placeholder="VD: dodaitoithieu6kytu@emaildomain.com" value="{{ old('email') }}">
                            <small class="email-error required">
                                @if ($errors->has('email'))
                                    @foreach ($errors->get('email') as $item)
                                        {{ $item }} <br>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label for="password">
                                Mật khẩu
                                <small class="required">*</small>
                            </label>
                            <input type="password" name="password" id="password" class="form-control">
                            <small class="password-error @php echo $errors->has('password') ? " required " : "" @endphp">
                                @if ($errors->has('password'))
                                    @foreach ($errors->get('password') as $item)
                                        {{ $item }} <br>
                                    @endforeach
                                @else
                                    Mật khẩu có ít nhất 8 kí tự, có tối thiểu 1 chữ và 1 số
                                @endif
                            </small>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="confirm-password">
                                Nhập lại mật khẩu
                                <small class="required">*</small>
                            </label>
                            <input type="password" name="confirm_password" id="confirm-password" class="form-control">
                            <small class="confirm-password-error @php echo $errors->has('confirm_password') ? "
                                required " : "" @endphp">
                                @if ($errors->has('confirm_password'))
                                    @foreach ($errors->get('confirm_password') as $item)
                                        {{ $item }} <br>
                                    @endforeach
                                @else
                                    Mật khẩu có ít nhất 8 kí tự, có tối thiểu 1 chữ và 1 số
                                @endif
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label for="password">
                                Địa chỉ
                                <small class="required">*</small>
                            </label>
                            <textarea name="address" id="address" cols="30" rows="5"
                                class="form-control">{{ old('address') }}</textarea>
                            <small class="address-error required">
                                @if ($errors->has('address'))
                                    @foreach ($errors->get('address') as $item)
                                        {{ $item }} <br>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <div class="form-check">
                                <input type="checkbox" name="agree" id="agree" class="form-check-input" value="true">
                                <label for="agree" class="form-check-label user-select-none">
                                    Đồng ý với <a href="#">điều khoản và chính sách của chúng tôi</a>
                                </label>
                            </div>
                            <small class="agree-error required">
                                @if ($errors->has('agree'))
                                    @foreach ($errors->get('agree') as $item)
                                        {{ $item }} <br>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <button type="submit" class="button-md-main">Đăng ký</button>
                        </div>
                        <div class="form-group col-lg-12">
                            <a href="{{ route('login.show') }}">Bạn đã có tài khoản? Hay đăng nhập trang web!</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4"></div>
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
            // Vietnamese's name validate
            function validateName(name) {
                const regex =
                    /^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựýỳỵỷỹ\s\W|_]+$/;
                return regex.test(name);
            }

            // Email validate
            function validateEmail(email) {
                const regex =
                    /^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/;
                return regex.test(email);
            }

            // Password validate: Có ít nhất 8 số, có tối thiểu 1 chữ và 1 số
            function validatePassword(password) {
                const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
                return regex.test(password);
            }

            // Register validate
            $('form.register-form').submit(function(e) {
                // Reset
                $('.first-name-error').text('');
                $('.last-name-error').text('');
                $('.gender-error').text('');
                $('.dob-error').text('');
                $('.email-error').text('');
                $('.password-error').text('Mật khẩu có ít nhất 8 kí tự, có tối thiểu 1 chữ và 1 số');
                $('.password-error').removeClass('required');
                $('.confirm-password-error').text(
                'Mật khẩu có ít nhất 8 kí tự, có tối thiểu 1 chữ và 1 số');
                $('.confirm-password-error').removeClass('required');
                $('.address-error').text('');
                $('.agree-error').text('');
                $('input#first-name').val($.trim($('input#first-name').val()));
                $('input#last-name').val($.trim($('input#last-name').val()));
                $('input#email').val($.trim($('input#email').val()));
                $('input#password').val($.trim($('input#password').val()));
                $('input#confirm-password').val($.trim($('input#confirm-password').val()));

                // Error messages
                let firstNameError = ['Vui lòng nhập họ của của bạn'];
                let lastNameError = ['Vui lòng nhập tên của của bạn'];
                let genderError = ['Vui lòng chọn giới tính của của bạn'];
                let dobError = ['Vui lòng nhập ngày sinh của của bạn'];
                let emailError = [
                    'Vui lòng nhập đúng định dạng email và email có độ dài tên tối thiểu 6 kí tự',
                    'Vui lòng nhập email của bạn'
                ];
                let passwordError = ['Mật khẩu có ít nhất 8 kí tự, có tối thiểu 1 chữ và 1 số'];
                let confirmPasswordError = [
                    'Mật khẩu có ít nhất 8 kí tự, có tối thiểu 1 chữ và 1 số',
                    'Hai mật khẩu của bạn nhập không khớp nhau'
                ];
                let addressError = ['Vui lòng nhập địa chỉ của của bạn'];
                let agreeError = ['Vui lòng đồng ý điều khoản và chính sách của chúng tôi'];

                // Validate
                let isValidated = true;
                if (!validateName($('#first-name').val())) {
                    isValidated = false;
                    $('.first-name-error').text(firstNameError[0]);
                }
                if (!validateName($('#last-name').val())) {
                    isValidated = false;
                    $('.last-name-error').text(lastNameError[0]);
                }
                if ($('#is-male').val() == "") {
                    isValidated = false;
                    $('.gender-error').text(genderError[0]);
                }
                if ($('#dob').val() == "") {
                    isValidated = false;
                    $('.dob-error').text(dobError[0]);
                }
                if ($('#email').val() == "") {
                    isValidated = false;
                    $('.email-error').text(emailError[1]);
                } else {
                    if (!validateEmail($('#email').val())) {
                        isValidated = false;
                        $('.email-error').text(emailError[0]);
                    }
                }
                if (!validatePassword($('#password').val())) {
                    isValidated = false;
                    $('.password-error').text(passwordError[0]);
                    $('.password-error').addClass('required');
                }
                if (!validatePassword($('#confirm-password').val())) {
                    isValidated = false;
                    $('.confirm-password-error').text(confirmPasswordError[0]);
                    $('.confirm-password-error').addClass('required');
                }
                if ($('#password').val() != $('#confirm-password').val()) {
                    isValidated = false;
                    $('.confirm-password-error').text(confirmPasswordError[1]);
                    $('.confirm-password-error').addClass('required');
                }
                if ($('#address').val() == "") {
                    isValidated = false;
                    $('.address-error').text(addressError[0]);
                }
                if (!$("#agree").prop("checked")) {
                    isValidated = false;
                    $('.agree-error').text(agreeError[0]);
                }

                if (!isValidated) {
                    e.preventDefault();
                }
            });
        })
    </script>
@endpush
