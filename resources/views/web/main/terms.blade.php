@extends('layouts.master')

@section('title')
    Điều khoản sử dụng | The Vietnam Newspaper | Trang thông tin - tin tức
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
                    <li>Điều khoản sử dụng</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="contact container">
        <div class="row">
            <div class="col-12">
                <h2 class="py-3">Điều khoản sử dụng</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="py-3">
                    <p><strong>Trường Đại học Thương Mại</strong></p>
                    <p>CS1: 79 Đ. Hồ Tùng Mậu, Mai Dịch, Cầu Giấy, Hà Nội</p>
                    <p>CS2: Đường Lý Thường Kiệt, phường Lê Hồng Phong, Phủ Lý, Hà Nam </p>
                    <p>ĐT: (024) 3768 ****</p>
                    <p>Fax: (024) 3764 ****</p>
                    <p>Email: mail***@***.edu.vn</p>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore saepe fuga harum quasi voluptates
                    laborum commodi explicabo, quia dolor labore at iusto praesentium blanditiis? Rem, provident id?
                    Aliquam, suscipit et. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis maxime nemo
                    architecto odit optio vitae distinctio non accusantium laudantium molestiae vel quae corrupti dolorum,
                    fugit dolore voluptatum tempore repellat ex. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Blanditiis illo deleniti quis sed aliquam earum! Hic suscipit ullam architecto vero ex dolore unde quos
                    ipsam repellat, magni voluptas magnam blanditiis!
                </p>
            </div>
            <div class="col-12">
                <hr>
                <a href="{{ route('policy') }}">Chính sách</a>
            </div>
        </div>
        <hr>
    </div>
@endsection

@push('js')

@endpush
