@extends('layouts.dashboard')

@section('title')
    Quản lý danh mục | The Vietnam Newspaper | Trang thông tin - tin tức
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
                        <li>Quản lý danh mục</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-3 mb-3">
                        <div class="count-record">
                            <div class="count-record-icon">
                                <span>
                                    @switch($category->id)
                                        @case(1)
                                            <i class="far fa-newspaper"></i>
                                        @break
                                        @case(2)
                                            <i class="fas fa-balance-scale-left"></i>
                                        @break
                                        @case(3)
                                            <i class="fas fa-chart-line"></i>
                                        @break
                                        @case(4)
                                            <i class="fas fa-cogs"></i>
                                        @break
                                        @case(5)
                                            <i class="fas fa-heartbeat"></i>
                                        @break
                                        @case(6)
                                            <i class="fas fa-umbrella-beach"></i>
                                        @break
                                        @case(7)
                                            <i class="fas fa-futbol"></i>
                                        @break
                                        @default
                                            <i class="far fa-file"></i>
                                    @endswitch
                                </span>
                            </div>
                            <div class="count-record-content">
                                <h5>{{ $category->posts_count }}</h5>
                                <p>{{ $category->name_vi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-3">
                    <div class="count-record">
                        <div class="count-record-icon">
                            <span><i class="fas fa-video"></i></span>
                        </div>
                        <div class="count-record-content">
                            <h5>{{ count($videos) }}</h5>
                            <p>Video</p>
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
                                    <th scope="col">Tỷ lệ bài viết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name_vi }}</td>
                                        <td class="data-posts" data-posts="{{ $category->posts_count }}">
                                            {{ $category->posts_count }}
                                        </td>
                                        <td>{{ ($category->posts_count / count($posts)) * 100 }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><strong>Tổng</strong></td>
                                    <td class="total-posts"></td>
                                    <td><strong>100%</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-6">
                    <div class="count-categories">
                        <h5>Video mới nhất</h5>
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
                                @foreach ($videos as $video)
                                    @php $i++; @endphp
                                    <tr>
                                        <td class="dashboard-title">{{ $video->title_vi }}</td>
                                        <td>{{ date('d/m/Y', strtotime($video->created_at)) }}</td>
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
