@extends('layouts.dashboard')

@section('title')
    Dashboard | The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@push('css')

@endpush

@section('content')
    <section class="dashboard-content">
        <div class="dashboard-container">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrum vi my-3">
                        <li><a href="javascript:void(0)">Dashboard</a></li>
                        {{-- <li><i class="fas fa-angle-right"></i></li> --}}
                        {{-- <li>Đăng nhập</li> --}}
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="count-record">
                        <div class="count-record-icon">
                            <span><i class="far fa-file-alt"></i></span>
                        </div>
                        <div class="count-record-content">
                            <h5>{{ count($texts) }}</h5>
                            <p>Tổng số bài viết</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="count-record">
                        <div class="count-record-icon">
                            <span><i class="fas fa-video"></i></span>
                        </div>
                        <div class="count-record-content">
                            <h5>{{ count($videos) }}</h5>
                            <p>Tổng số video</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="count-record">
                        <div class="count-record-icon">
                            <span><i class="fas fa-users"></i></span>
                        </div>
                        <div class="count-record-content">
                            <h5>{{ count($users) }}</h5>
                            <p>Tổng số người dùng</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="count-record">
                        <div class="count-record-icon">
                            <span><i class="far fa-comments"></i></span>
                        </div>
                        <div class="count-record-content">
                            <h5>{{ $comments }}</h5>
                            <p>Tổng số tương tác</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-6">
                    <div class="count-categories">
                        <h5>Danh mục bài viết</h5>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Số bài viết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name_vi }}</td>
                                        <td class="data-posts" data-posts="{{ $category->posts_count }}">
                                            {{ $category->posts_count }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><strong>Tổng</strong></td>
                                    <td class="total-posts"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-6">
                    <div class="count-categories">
                        <h5>Người dùng mới</h5>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Giới tính</th>
                                    <th scope="col">Ngày sinh</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($users as $user)
                                    @php $i++; @endphp
                                    <tr>
                                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                        <td>
                                            @if ($user->userInformation->is_male == 1)
                                                Nam
                                            @else
                                                Nữ
                                            @endif
                                        </td>
                                        <td>{{ date('d/m/Y', strtotime($user->userInformation->dob)) }}</td>
                                    </tr>
                                    @if ($i >= 8) @break @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-12">
                    <div class="count-categories">
                        <h5>Bài viết mới</h5>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Ngày đăng</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($posts as $post)
                                    @php $i++; @endphp
                                    <tr>
                                        <td>{{ $post->title_en }}</td>
                                        <td>{{ date('d/m/Y H:i:s', strtotime($post->created_at)) }}</td>
                                        <td><a href="#" class="text-decoration-none text-light button-md-main">Xem</a></td>
                                    </tr>
                                    @if ($i >= 5) @break @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        $(function() {
            var totals = 0;
            $('td.data-posts').each(function(index, element) {
                // element == this
                totals += parseInt($(this).attr('data-posts'));
            });
            $('td.total-posts').html('<strong>' + totals + '</strong>');
        })
    </script>
@endpush
