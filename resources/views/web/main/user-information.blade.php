@extends('layouts.master')

@section('title')
    Thông tin cá nhân | The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@section('content')
    <div class="container">
        <ul class="breadcrum vi">
            <li><a href="/">Trang chủ</a></li>
            <li><i class="fas fa-angle-right"></i></li>
            <li>Thông tin cá nhân</li>
        </ul>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <form onsubmit="return false;" class="my-3">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <h2>Thông tin cá nhân</h2>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label for="first-name">
                                Họ
                            </label>
                            <input type="text" class="form-control" value="{{ Auth::user()->first_name }}" readonly>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="last-name">
                                Tên
                            </label>
                            <input type="text" class="form-control" value="{{ Auth::user()->last_name }}" readonly>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="is-male">
                                Giới tính
                            </label>
                            <input type="text" class="form-control" readonly
                                value="{{ Auth::user()->userInformation ? (Auth::user()->userInformation->is_male == 1 ? 'Nam' : 'Nữ') : 'Không có dữ liệu' }}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="dob">
                                Ngày sinh
                            </label>
                            <input type="text" class="form-control" readonly
                                value="{{ Auth::user()->userInformation ? date('d/m/Y', strtotime(Auth::user()->userInformation->dob)) : 'Không có dữ liệu' }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label for="email">
                                Email
                            </label>
                            <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label for="password">
                                Địa chỉ
                                <small class="required">*</small>
                            </label>
                            <input type="text" class="form-control" readonly
                                value="{{ Auth::user()->userInformation ? Auth::user()->userInformation->address : 'Không có dữ liệu' }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <a href="{{ route('userInformation.showEditForm') }}" class="btn btn-sm btn-secondary">Thay
                                đổi thông tin cá nhân</a>
                            <a href="{{ route('user.changePasswordForm') }}" class="btn btn-sm btn-secondary">Thay đổi mật
                                khẩu</a>
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

@endpush
