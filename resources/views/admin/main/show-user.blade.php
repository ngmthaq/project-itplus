@extends('layouts.dashboard')

@section('title')
    {{ $user->first_name }} {{ $user->last_name }} | The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@push('css')

@endpush

@section('content')
    <section class="dashboard-content">
        <div class="dashboard-container">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrum vi my-3">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li><a href="{{ route('admin.userManagerForm') }}">Quản lý người dùng</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li>{{ $user->first_name }} {{ $user->last_name }}</li>
                    </ul>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="padding-12">
                        <h5>Thông tin người dùng</h5>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <div class="padding-12">
                        <p>Họ tên: {{ $user->first_name }} {{ $user->last_name }}</p>
                        <p>Ngày sinh: {{ date('d/m/Y', strtotime($user->userInformation->dob)) }}</p>
                        <p>Giới tính:
                            @php
                                echo ($user->userInformation->is_male == 1) ? 'Nam' : 'Nữ'
                            @endphp
                        </p>
                        <p>Địa chỉ: {{ $user->userInformation->address }}</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="padding-12">
                        <p>Email: {{ $user->email }}</p>
                        <p>Ngày tham gia: {{ $user->created_at }}</p>
                        <p>Bài viết đã đăng: {{ count($user->posts) }}</p>
                        <p>Tương tác: {{ count($user->comments) }}</p>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="padding-12">
                        <a href="{{ route('admin.userManagerForm') }}">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')

@endpush
