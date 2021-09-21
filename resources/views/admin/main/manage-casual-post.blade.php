@extends('layouts.dashboard')

@section('title')
    Quản lý bài viết | The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@push('css')
    <style>
        .title_vi {
            max-width: 600px;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

    </style>
@endpush

@section('content')
    <section class="dashboard-content">
        <div class="dashboard-container">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrum vi my-3">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li>Quản lý bài viết</li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li>Tất cả bài viết</li>
                    </ul>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="padding-12">
                        <div class="label-container mb-2">
                            <h5>Tất cả bài viết</h5>
                            <h5>{{ count($posts) }} bài viết</h5>
                        </div>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Ngày đăng bài</th>
                                    <th scope="col">Lần sửa bài gần nhất</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($posts) > 0)
                                    @foreach ($posts as $post)
                                        <tr>
                                            <th scope="row">{{ $post->id }}</th>
                                            <td class="title_vi">{{ $post->title_vi }}</td>
                                            <td>{{ date('d/m/Y H:i:s', strtotime($post->created_at)) }}</td>
                                            <td>
                                                @if (strcmp($post->created_at, $post->updated_at) == 0)
                                                    Không có dữ liệu
                                                @else
                                                    {{ date('d/m/Y H:i:s', strtotime($post->updated_at)) }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($post->deleted_at)
                                                    <button disabled type="button" class="btn btn-sm btn-secondary">
                                                        Đã xoá
                                                    </button>
                                                @else
                                                    <a href="#" class="btn btn-sm btn-outline-primary" title="Xem bài viết">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('post.editCasualPostForm', ['post' => $post->id]) }}"
                                                        class="btn btn-sm btn-outline-warning" title="Sửa bài viết">
                                                        <i class="fas fa-pencil-ruler"></i>
                                                    </a>
                                                    {{-- <a href="javascript:void(0)" data-id="{{ $post->id }}"
                                                        class="btn btn-sm btn-outline-danger" title="Xoá bài viết">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a> --}}
                                                    <form action="{{ route('post.deletePost', ['post' => $post->id]) }}"
                                                        method="post" class="d-inline" onsubmit="return confirm('Bạn muốn xoá bài viết này?')">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">Không có bài viết</td>
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
    <script>
        // function deletePost(e) {
        //     const CONFIRM = confirm('Bạn muốn xoá bài viết này?');
        //     if (CONFIRM) {
        //         let id = e.getAttribute('data-id');
        //         console.log(id);
        //         axios.put('admin/posts/' + id + '/delete')
        //             .then((result) => {
        //                 console.log(result);
        //             }).catch((err) => {
        //                 console.log(err);
        //             });
        //     }
        // }
    </script>
@endpush
