@extends('layouts.master')

@section('title')
    {{ $post->title_vi }} | The Vietnam Newspaper | Trang thông tin - tin tức
@endsection

@push('css')
    <style>
        .post-container {
            background-color: #fff;
            border-radius: 1px;
            overflow: hidden;
            padding: 12px 24px;
        }

        .category-type {
            position: absolute;
            top: 0;
            left: 0;
            background: var(--main-color);
            color: #fff;
            padding: 2px 4px;
        }

        .img-container {
            height: 300px;
        }

        .img-container img {
            object-fit: cover;
        }

        .image.image_resized {
            display: flex;
            margin: 18px auto 6px;
        }

        .image {
            display: flex;
            margin: 18px auto 6px;
        }

        img {
            object-fit: contain;
            width: 100%;
            height: 100%;
        }

        .content-container {
            padding: 0 12px;
        }

        .content-container .title {
            height: 50px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            margin: 6px 0;
        }

        .content-container .subtitle {
            height: 100px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 4;
            margin-bottom: 12px;
        }

        .popular-item {
            position: relative;
        }

        .type-name {
            position: absolute;
            top: 0;
            left: 0;
            padding: 1px 2px;
        }

        .category-name {
            display: inline-block;
            background: var(--main-color);
            color: #fff;
        }

        .post-content p {
            line-height: 28px;
            font-size: 18px;
        }

        .text-small {
            line-height: 18px;
            font-size: 14px;
            padding: 0 32px;
            display: block;
        }

        .user-information {
            display: flex;
            align-items: flex-start;
        }

        .user-image {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--main-color);
            color: #fff;
            border-radius: 50%;
            margin-right: 10px;
            margin-top: 4px;
        }

        .comment {
            background: var(--rgba-main-color);
            padding: 4px 16px;
            border-radius: 10px;
            display: flex;
        }

        .comment-action {
            margin-left: 12px;
            font-size: 12px;
            padding: 4px;
        }

        .comment-form {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }

    </style>
@endpush

@section('content')
    <div class="container split-header">
        <div class="row mb-3">
            <div class="col-12">
                <ul class="breadcrum vi mt-0">
                    <li><a href="/">Trang chủ</a></li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>
                        <a href="{{ route('category.showPosts', ['category' => $category->id]) }}">
                            {{ $category->name_vi }}
                        </a>
                    </li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li style="width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"
                        title="{{ $post->title_vi }}">
                        {{ $post->title_vi }}
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-9">
                <h5 class="py-3 px-2">
                    {{ $category->name_vi }}
                </h5>
                <div class="post-container mb-3">
                    <h2 class="pb-2">{{ $post->title_vi }}</h2>
                    <p class="pb-4">
                        <small>
                            Ngày đăng: {{ date('d/m/Y', strtotime($post->created_at)) }}
                            bởi {{ $post->user->first_name }} {{ $post->user->last_name }}
                        </small>
                    </p>
                    <p>{{ $post->subtitle_vi }}</p>
                    @if ($post->type_id == 1)
                        <div class="post-content pb-3">
                            {!! $post->content_vi !!}
                        </div>
                    @else
                        <div class="my-5">
                            <video controls muted width="100%" height="100%">
                                <source src="{{ $post->content_vi }}" type="video/mp4">
                            </video>
                        </div>
                    @endif
                </div>
                <h5>Bình luận</h5>
                <div class="comment-container mb-3 bg-light p-2">
                    <div class="user-comment my-2">
                        @if (count($comments) > 0)
                            @foreach ($comments as $comment)
                                <div class="user-information mb-2">
                                    <div class="user-image">
                                        {{ ucfirst(substr($comment->user->first_name, 0, 1)) }}
                                    </div>
                                    <div class="comment">
                                        <div>
                                            <p class="user-name">
                                                <strong>
                                                    {{ $comment->user->first_name }}
                                                    {{ $comment->user->last_name }}
                                                </strong>
                                            </p>
                                            <form>
                                                <p class="comment-text">{{ $comment->content }}</p>
                                                <input type="text"
                                                    style="border: none; border-bottom: 1px solid var(--secondary); box-shadow: none; display:none;"
                                                    class="form-control edit-comment">
                                                <button type="submit" class="btn btn-outline-none" style="display:none;">
                                                    <i class="fas fa-paper-plane"></i>
                                                </button>
                                            </form>
                                        </div>
                                        @auth
                                            @if (Auth::user()->id == $comment->user->id)
                                                <div class="comment-action">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="my-2">Không có bình luận</p>
                        @endif
                    </div>
                    @if (Auth::check())
                        <form id="add-new-comment" class="comment-form mt-3" onsubmit="return false;">
                            <input type="hidden" name="post_id" value="{{ $post->id }}" id="post-id">
                            <input type="text"
                                style="border: none; border-bottom: 1px solid var(--secondary); box-shadow: none;"
                                id="new-comment" class="form-control" placeholder="Nhập bình luận của bạn...">
                            <button type="button" class="btn btn-outline-none" id="add-new-comment-button"
                                onclick="addComment(this)">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    @else
                        <!-- Button trigger modal -->
                        <p class="my-3">
                            Vui lòng
                            <a href="{{ route('login.show') }}" data-toggle="modal" data-target="#login-modal">
                                đăng nhập
                            </a>
                            để bình luận
                        </p>
                        <!-- Modal -->
                        <div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="login-modal-label"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="login-modal-label">Đăng nhập</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="login-form" action="{{ route('login.modalLogin') }}"
                                            method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email">
                                                    Email
                                                    <small class="required">*</small>
                                                </label>
                                                <input type="text" name="email" id="email" class="form-control"
                                                    value="{{ old('email') }}"
                                                    placeholder="VD: dodaitoithieu6kytu@emaildomain.com">
                                                <small class="required email-error">
                                                    @if ($errors->has('email'))
                                                        @foreach ($errors->get('email') as $item)
                                                            {{ $item }} <br>
                                                        @endforeach
                                                    @endif
                                                </small>
                                            </div>
                                            <div class="form-group">
                                                <div class="label-container">
                                                    <label class="vi" for="password">
                                                        Mật khẩu
                                                        <small class="required">*</small>
                                                    </label>
                                                    <label class="vi">
                                                        <a href="{{ route('user.getEmail') }}">
                                                            Quên mật khẩu?
                                                        </a>
                                                    </label>
                                                </div>
                                                <input type="password" name="password" id="password" class="form-control">
                                                <small class="password-error required">
                                                    @if ($errors->has('password'))
                                                        @foreach ($errors->get('password') as $item)
                                                            {{ $item }} <br>
                                                        @endforeach
                                                    @endif
                                                    @if (session('login_error'))
                                                        {{ session('login_error') }}
                                                    @endif
                                                </small>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input type="checkbox" name="remember-me" id="remember-me"
                                                        class="form-check-input" value="true">
                                                    <label for="remember-me" class="form-check-label user-select-none">
                                                        Lưu đăng nhập
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="label-container">
                                                    <button class="vi button-md-main" type="submit">Đăng nhập</button>
                                                    <label>
                                                        <a href="{{ route('register.show') }}">
                                                            Đăng ký tài khoản?
                                                        </a>
                                                    </label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-3">
                <h5 class="py-3">&nbsp;</h5>
                <div class="mb-3">
                    <h5 class="py-3 px-1 bg-blue text-center">Danh mục</h5>
                    <div class="category-count-container p-1 bg-light">
                        <ul>
                            @foreach ($categories as $category)
                                <li class="label-container py-2 px-1">
                                    <a href="{{ route('category.showPosts', ['category' => $category->id]) }}"
                                        class="link d-inline-block @php echo $site == $category->id ? 'active' : '' @endphp">
                                        {{ $category->name_vi }}
                                    </a>
                                    <span>{{ $category->posts_count }} bài</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="popular-posts mb-3">
                    <h5 class="py-3 px-1 bg-secondary text-center text-light">Phổ biến</h5>
                    <ul class="popular-posts-container bg-light pb-1">
                        @foreach ($popularPosts as $post)
                            <li class="label-container popular-item mb-3"
                                style="height: 120px; border-bottom: 1px solid #999;">
                                <small class="type-name bg-main">{{ $post->type->name_vi }}</small>
                                <div class="img-container" style="height: inherit; flex: 1;">
                                    <img src="{{ $post->cover_url }}" alt="{{ $post->cover_url }}" width="100%"
                                        height="100%">
                                </div>
                                <div class="content-container" style="flex: 1;">
                                    <p>
                                        <strong>
                                            <a href="{{ route('post.showPostDetail', ['post' => $post->id]) }}"
                                                class="link title">
                                                {{ $post->title_vi }}
                                            </a>
                                            <small>{{ date('d/m/Y', strtotime($post->created_at)) }}</small><br>
                                            <small>{{ $post->totalComments }} <i class="far fa-comment-dots"></i></small>
                                        </strong>
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function addComment(e) {
            let newCommentInput = document.querySelector('input#new-comment').value;
            let postId = document.querySelector('input#post-id').value;
            axios.post('/add-comment/' + postId, {
                post_id: postId,
                content: newCommentInput
            }).then((result) => {
                let parent = document.querySelector('.user-comment');
                document.querySelector('input#new-comment').value = "";
                parent.innerHTML = result.data;
            }).catch((err) => {
                console.error(err);
            });
        }

        let newCommentInput = document.querySelector('input#new-comment');
        newCommentInput.addEventListener('keydown', function(e) {
            if (e.which == 13) {
                document.querySelector('button#add-new-comment-button').click();
            }
        })

        $(function() {
            // Email validate
            function validateEmail(email) {
                const regex =
                    /^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/;
                return regex.test(email);
            }

            // Password validate: Có ít nhất 8 số, có tối thiểu 1 chữ và 1 số
            function validatePassword(password) {
                const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
                return regex.test(password)
            }

            // Login validate
            $('form.login-form').submit(function(e) {
                // Reset
                $('small.email-error').text("");
                $('small.password-error').text("");
                $('input#email').val($.trim($('input#email').val()));
                $('input#password').val($.trim($('input#password').val()));

                let isValidated = true;
                let emailErr = [
                    'Vui lòng nhập đúng định dạng email và email có độ dài tên tối thiểu 6 kí tự',
                    'Vui lòng nhập email của bạn'
                ];
                let passwordErr = [
                    'Mật khẩu có ít nhất 8 kí tự, có tối thiểu 1 chữ và 1 số'
                ];
                if ($('input#email').val() == "") {
                    isValidated = false;
                    $('small.email-error').text(emailErr[1]);
                } else {
                    if (!validateEmail($('input#email').val())) {
                        isValidated = false;
                        $('small.email-error').text(emailErr[0]);
                    }
                }
                if (!validatePassword($('input#password').val())) {
                    isValidated = false;
                    $('small.password-error').text(passwordErr[0]);
                    $('small.password-error').addClass('required');
                }
                if (!isValidated) {
                    e.preventDefault();
                }
            });
        })
    </script>
@endpush
