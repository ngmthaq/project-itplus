@extends('layouts.master')

@section('title')
    Thay đổi thông tin cá nhân | The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@section('content')
    <div class="container">
        <ul class="breadcrum vi">
            <li><a href="/">Trang chủ</a></li>
            <li><i class="fas fa-angle-right"></i></li>
            <li>Thay đổi thông tin cá nhân</li>
        </ul>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-12">
                <form action="{{ route('userInformation.edit') }}" class="edit-form" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-12">
                            <h2 class="my-3">Thay đổi thông tin cá nhân</h2>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label for="first-name">
                                Họ
                                <small class="required">*</small>
                            </label>
                            <input type="text" name="first_name" id="first-name" class="form-control"
                                placeholder="VD: Nguyễn" value="{{ Auth::user()->first_name }}">
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
                                placeholder="VD: Văn A" value="{{ Auth::user()->last_name }}">
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
                                @if (Auth::user()->userInformation)
                                    @if (Auth::user()->userInformation->is_male == 1)
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    @else
                                        <option value="0">Nữ</option>
                                        <option value="1">Nam</option>
                                    @endif
                                @else
                                    <option value="">Chọn giới tính...</option>
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                @endif
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
                            <input type="date" name="dob" id="dob" class="form-control"
                                value="{{ Auth::user()->userInformation ? Auth::user()->userInformation->dob : '' }}">
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
                            <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
                            <small>
                                Không thể thay đổi email
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
                                class="form-control">{{ Auth::user()->userInformation ? Auth::user()->userInformation->address : '' }}</textarea>
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
                            <button type="submit" class="button-md-main">Thay đổi thông tin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('css')

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

            // Password validate: Có ít nhất 8 số, có tối thiểu 1 chữ và 1 số
            function validatePassword(password) {
                const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
                return regex.test(password);
            }

            // Register validate
            $('form.edit-form').submit(function(e) {
                // Reset
                $('.first-name-error').text('');
                $('.last-name-error').text('');
                $('.gender-error').text('');
                $('.dob-error').text('');
                $('.address-error').text('');
                $('input#first-name').val($.trim($('input#first-name').val()));
                $('input#last-name').val($.trim($('input#last-name').val()));

                // Error messages
                let firstNameError = ['Vui lòng nhập họ của của bạn'];
                let lastNameError = ['Vui lòng nhập tên của của bạn'];
                let genderError = ['Vui lòng chọn giới tính của của bạn'];
                let dobError = ['Vui lòng nhập ngày sinh của của bạn'];
                let addressError = ['Vui lòng nhập địa chỉ của của bạn'];

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
                if (!isValidated) {
                    e.preventDefault();
                }
            });
        })
    </script>
@endpush
