@extends('layouts.master')

@section('title')
    Liên hệ | The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@push('css')
    <style>
        .contact-map {
            height: 100%;
        }

        .contact-form-container {
            border-radius: 4px;
        }

    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="breadcrum vi">
                    <li><a href="/">Trang chủ</a></li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>Liên hệ</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="contact container">
        <div class="row">
            <div class="col-12">
                <h2 class="py-3">Liên hệ</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="py-3">
                    <p><strong>Trường Đại học Thương Mại</strong></p>
                    <p>CS1: 79 Đ. Hồ Tùng Mậu, Mai Dịch, Cầu Giấy, Hà Nội</p>
                    <p>CS2: Đường Lý Thường Kiệt, phường Lê Hồng Phong, Phủ Lý, Hà Nam </p>
                    <p>ĐT: (024) 3768 ****</p>
                    <p>Fax: (024) 3764 ****</p>
                    <p>Email: mail***@***.edu.vn</p>
                </div>
            </div>
            <div class="col-6">
                <h5 class="pb-3">Fanpage</h5>
                <div class="fb pb-3">
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fthevietnamnewspaper%2F&tabs&width=540&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                        width="540" height="130" style="border:none;overflow:hidden;" scrolling="no" frameborder="0"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                    </iframe>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h5 class="pb-3">Bản đồ</h5>
                <div class="contact-map pb-5">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8996500727862!2d105.77282945042474!3d21.036700885925303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b6163c392f%3A0x1ebf64facbb56d03!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBUaMawxqFuZyBt4bqhaQ!5e0!3m2!1svi!2s!4v1632567239807!5m2!1svi!2s"
                        width="100%" height="100%" style="border:1px solid #999;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
            <div class="col-6">
                <h5 class="mb-3">Phản hồi lại cho chúng tôi</h5>
                <div class="contact-form-container bg-light p-3">
                    <form action="{{ route('addFeedback') }}" class="feedback-form" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="first_name">
                                    Họ
                                    <small class="required">*</small>
                                </label>
                                <input type="text" name="first_name" id="first-name" class="form-control"
                                    placeholder="VD: Nguyen">
                                <small class="first-name-error required">
                                    @if ($errors->has('first_name'))
                                        @foreach ($errors->get('first_name') as $item)
                                            {{ $item }} <br>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-6">
                                <label for="last_name">
                                    Tên
                                    <small class="required">*</small>
                                </label>
                                <input type="text" name="last_name" id="last-name" class="form-control"
                                    placeholder="VD: Van A">
                                <small class="last-name-error required">
                                    @if ($errors->has('last_name'))
                                        @foreach ($errors->get('last_name') as $item)
                                            {{ $item }} <br>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="email">
                                    Email
                                    <small class="required">*</small>
                                </label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="VD: your_email@example.com">
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
                            <div class="form-group col-12">
                                <label for="subject">
                                    Tiêu đề
                                    <small class="required">*</small>
                                </label>
                                <input type="text" name="subject" id="subject" class="form-control"
                                    placeholder="VD: Your feedback ...">
                                <small class="subject-error required">
                                    @if ($errors->has('subject'))
                                        @foreach ($errors->get('subject') as $item)
                                            {{ $item }} <br>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="content">
                                    Nội dung
                                    <small class="required">*</small>
                                </label>
                                <textarea name="content" id="content" class="form-control" cols="30" rows="8"></textarea>
                                <small class="content-error required">
                                    @if ($errors->has('content'))
                                        @foreach ($errors->get('content') as $item)
                                            {{ $item }} <br>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group mb-0 col-12 text-center">
                                <button type="submit" class="btn btn-sm btn-primary">Gửi phản hổi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection

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
            $('form.feedback-form').submit(function(e) {
                // Reset
                $('.first-name-error').text('');
                $('.last-name-error').text('');
                $('.email-error').text('');
                $('.subject-error').text('');
                $('.content-error').text('');
                $('input#first-name').val($.trim($('input#first-name').val()));
                $('input#last-name').val($.trim($('input#last-name').val()));
                $('input#email').val($.trim($('input#email').val()));
                $('input#subject').val($.trim($('input#subject').val()));
                $('input#content').val($.trim($('input#content').val()));

                // Error messages
                let firstNameError = ['Vui lòng nhập họ của của bạn'];
                let lastNameError = ['Vui lòng nhập tên của của bạn'];
                let subjectError = ['Vui lòng nhập tiêu đề'];
                let contentError = ['Vui lòng nhập Nội dung'];
                let emailError = [
                    'Vui lòng nhập đúng định dạng email và email có độ dài tên tối thiểu 6 kí tự',
                    'Vui lòng nhập email của bạn'
                ];

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
                if ($('#email').val() == "") {
                    isValidated = false;
                    $('.email-error').text(emailError[1]);
                } else {
                    if (!validateEmail($('#email').val())) {
                        isValidated = false;
                        $('.email-error').text(emailError[0]);
                    }
                }
                if ($('#subject').val() == "") {
                    isValidated = false;
                    $('.subject-error').text(subjectError[0]);
                }
                if ($('#content').val() == "") {
                    isValidated = false;
                    $('.content-error').text(contentError[0]);
                }
                if (!isValidated) {
                    e.preventDefault();
                }
            });
        })
    </script>
@endpush
