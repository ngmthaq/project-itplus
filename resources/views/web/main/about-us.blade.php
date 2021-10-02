@extends('layouts.master')

@section('title')
    Giới thiệu | The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@push('css')

@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="breadcrum vi">
                    <li><a href="/">Trang chủ</a></li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>Giới thiệu</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="contact container">
        <div class="row">
            <div class="col-12">
                <h2 class="py-3">Giới thiệu</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <p class="pb-3">
                    <strong>The Vietnam Newspaper</strong> là một dự án trang báo chia sẻ thông tin, tin tức
                    của học viên trung tâm ITPlus khoá học lập trình website chuyên nghiệp.
                </p>
                <p>
                    Trong thời đại phát triển 4.0 như hiện nay, việc tiếp cận và chia sẻ các thông tin tin tức là một điều
                    khá dễ dàng. Tuy nhiên, việc tiếp cận 1 nguồn thông tin chính cống, tránh tiếp xúc các nội dung giả
                    là một việc cực kì khó. Trang web này lập ra nhằm mục đích cung cấp các thông tin chính xác đã được
                    xác thực đến đọc giả, giúp đọc giả dễ dàng tiếp cận thông tin hơn cũng như tránh được các thông tin sai
                    sự thật.
                </p>
                <div class="fb py-3">
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fthevietnamnewspaper%2F&tabs&width=540&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                        width="540" height="130" style="border:none;overflow:hidden;" scrolling="no" frameborder="0"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                    </iframe>
                </div>
            </div>
            <div class="col-4">
                <div class="img-box">
                    <img src="{{ asset('assets/images/THE VIETNAM NEWSPAPER (1).png') }}" alt="logo" width="100%"
                        height="100%">
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection

@push('js')

@endpush
