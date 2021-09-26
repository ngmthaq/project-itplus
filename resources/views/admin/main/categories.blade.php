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
                                            <i class="fas fa-balance-scale-left"></i>
                                        @break
                                        @case(2)
                                            <i class="fas fa-chart-line"></i>
                                        @break
                                        @case(3)
                                            <i class="fas fa-cogs"></i>
                                        @break
                                        @case(4)
                                            <i class="fas fa-heartbeat"></i>
                                        @break
                                        @case(5)
                                            <i class="fas fa-umbrella-beach"></i>
                                        @break
                                        @case(6)
                                            <i class="fas fa-futbol"></i>
                                        @break
                                        @default
                                            <i class="far fa-file"></i>
                                    @endswitch
                                </span>
                            </div>
                            <div class="count-record-content">
                                <h5>{{ $category->valid_posts }}</h5>
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
                <div class="col-3">
                    <div class="count-record">
                        <div class="count-record-icon">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="count-record-content">
                            <h5>{{ count($monthlyPosts) }}</h5>
                            <p>Số tin mới trong tháng</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-6">
                    <div class="count">
                        <div class="label-container">
                            <h5>Danh mục bài viết</h5>
                            <a href="{{ route('post.manageCasualPost') }}" class="link">Xem tất cả</a>
                        </div>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Số bài viết</th>
                                    <th scope="col">Tỷ lệ bài viết</th>
                                    <th title="Tỉ lệ số lượt tương tác của từng danh mục so với tổng số lượt tương tác"
                                        scope="col">Tỷ lệ tương tác
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name_vi }}</td>
                                        <td>
                                            {{ $category->valid_posts }}
                                        </td>
                                        @if (count($posts) > 0)
                                            <td>⁓{{ round(($category->valid_posts / count($posts)) * 100, 3) }}%</td>
                                        @else
                                            <td>{{ $category->valid_posts }}</td>
                                        @endif
                                        @if ($totalComments > 0)
                                            <td>⁓{{ round(($category->comments / $totalComments) * 100, 3) }}%</td>
                                        @else
                                            <td>{{ $category->comments }}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><strong>Tổng</strong></td>
                                    <td><strong>{{ count($posts) }}</strong></td>
                                    <td><strong>@php echo count($posts) > 0 ? '100%' : '0'  @endphp</strong></td>
                                    <td><strong>@php echo $totalComments > 0 ? '100%' : '0'  @endphp</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-6">
                    <div class="count">
                        <div class="label-container">
                            <h5>Bài đăng video mới</h5>
                            <a href="{{ route('post.manageVideoPost') }}" class="link">Xem tất cả</a>
                        </div>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Ngày đăng</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($videos) > 0)
                                    @php $i = 0; @endphp
                                    @foreach ($videos as $video)
                                        @php $i++; @endphp
                                        <tr>
                                            <td class="dashboard-title" title="{{ $video->title_vi }}">{{ $video->title_vi }}</td>
                                            <td>{{ date('d/m/Y', strtotime($video->created_at)) }}</td>
                                            <td>
                                                <a href="#" class="text-decoration-none text-light button-md-main">
                                                    Xem
                                                </a>
                                            </td>
                                        </tr>
                                        @if ($i >= 5) @break @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">Không có video</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    
@endpush
