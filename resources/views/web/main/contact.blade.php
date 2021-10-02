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
                    <form action="" class="contact-form">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="first_name">
                                    Họ
                                    <small class="required">*</small>
                                </label>
                                <input type="text" name="first_name" id="first-name" class="form-control"
                                    placeholder="VD: Nguyen">
                            </div>
                            <div class="form-group col-6">
                                <label for="lastt_name">
                                    Tên
                                    <small class="required">*</small>
                                </label>
                                <input type="text" name="lastt_name" id="lastt-name" class="form-control"
                                    placeholder="VD: Van A">
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
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="content">
                                    Nội dung
                                    <small class="required">*</small>
                                </label>
                                <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
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

@endpush
