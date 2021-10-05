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
            /* display: flex;
                                                                            align-items: flex-start; */
        }

        .user-image {
            width: 30px;
            height: 30px;
            display: inline-block;
            text-align: center;
            line-height: 30px;
            background: var(--main-color);
            color: #fff;
            border-radius: 50%;
            margin-right: 10px;
            margin-top: 4px;
            float: left;
        }

        .comment {
            background: var(--rgba-main-color);
            padding: 4px 16px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
        }

        .comment-action {
            margin-left: 12px;
            font-size: 12px;
            padding: 4px;
            cursor: pointer;
            user-select: none;
        }

        .comment-action-container {
            display: flex;
            justify-content: flex-end;
        }

        .comment-action-container li {
            padding: 2px 4px;
            font-size: 16px;
            margin: 2px 8px 8px 0;
            cursor: pointer;
            user-select: none;
        }

        .comment-form {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }

        .edit-comment {
            border: none;
            box-shadow: none;
            display: none;
            box-shadow: none !important;
            height: 100%;
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
                    <p class="pb-1">
                        <small>
                            Ngày đăng: {{ date('d/m/Y', strtotime($post->created_at)) }}
                            bởi {{ $post->user->first_name }} {{ $post->user->last_name }}
                        </small>
                    <div class="fb-share-button mb-3" data-href="{{ Request::url() }}" data-layout="button_count"
                        data-size="small">
                        <a target="_blank"
                            href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"
                            class="fb-xfbml-parse-ignore">Chia sẻ
                        </a>
                    </div>
                    <div class="fb-save" data-uri="{{ Request::url() }}" data-size="small"></div>
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
                    <p class="mt-1 mb-3">
                        <a href="javascript:void(0)" class="link" id="show-more-comment"
                            style="color: royalblue; user-select: none; @php echo count($comments) < 6 ? 'display: none;' : '' @endphp" data-post="{{ $post->id }}"
                            onclick="showNextSixComments(this)">
                            Xem thêm bình luận
                        </a>
                    </p>
                    <div class="user-comment my-2">
                        @if (count($comments) > 0)
                            @foreach ($comments as $comment)
                                <div class="user-information mb-2">
                                    <div class="user-image">
                                        {{ ucfirst(substr($comment->user->first_name, 0, 1)) }}
                                    </div>
                                    <div class="comment">
                                        <div style="flex: 9;">
                                            <p class="user-name">
                                                <strong>
                                                    {{ $comment->user->first_name }}
                                                    {{ $comment->user->last_name }}
                                                </strong>
                                            </p>
                                            <form class="d-flex align-items-center" onsubmit="return false;">
                                                <p class="comment-text">{{ $comment->content }}</p>
                                                <input type="text" class="form-control edit-comment" required>
                                                <button type="button" class="btn btn-outline-none" style="display:none;"
                                                    onclick="editComment(this)" data-comment="{{ $comment->id }}">
                                                    <i class="fas fa-paper-plane"></i>
                                                </button>
                                            </form>
                                        </div>
                                        @auth
                                            @if (Auth::user()->id == $comment->user->id || Auth::user()->role_id == 1)
                                                <div class="comment-action text-right" style="flex: 1;">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                    @auth
                                        @if (Auth::user()->id == $comment->user->id)
                                            <ul class="comment-action-container" style="display: none;">
                                                <li class="text-primary edit-button">Sửa</li>
                                                <li class="text-danger delete-button" data-comment="{{ $comment->id }}"
                                                    onclick="deleteComment(this)">
                                                    Xoá
                                                </li>
                                                <li class="text-dark cancel-button" style="display: none">Huỷ</li>
                                            </ul>
                                        @else
                                            @if (Auth::user()->role_id == 1)
                                                <ul class="comment-action-container" style="display: none;">
                                                    <li class="text-danger delete-button" data-comment="{{ $comment->id }}"
                                                        onclick="deleteComment(this)">
                                                        Xoá bình luận vi phạm
                                                    </li>
                                                </ul>
                                            @endif
                                        @endif
                                    @endauth
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
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#login-modal">
                                đăng nhập
                            </a>
                            để bình luận
                        </p>
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
                @include('web.parts.fb._page')
            </div>
        </div>
    </div>
@endsection

@push('js')
    @auth
        <script>
            let newCommentInput = document.querySelector('input#new-comment');
            newCommentInput.addEventListener('keydown', function(e) {
                if (e.which == 13) {
                    document.querySelector('button#add-new-comment-button').click();
                }
            })
        </script>
    @endauth

    <script>
        function addComment(e) {
            let newCommentInput = document.querySelector('input#new-comment').value;
            let total = document.querySelectorAll('.user-information').length;
            let postId = document.querySelector('input#post-id').value;
            axios.post('/add-comment/' + postId + '/comment/' + total, {
                content: newCommentInput
            }).then((result) => {
                let showMoreComments = document.querySelector('a#show-more-comment');
                let parent = document.querySelector('.user-comment');
                document.querySelector('input#new-comment').value = "";
                parent.innerHTML = result.data;
                if (parent.querySelectorAll('.user-information').length == total) {
                    showMoreComments.style.display = 'block';
                }
            }).catch((err) => {
                console.error(err);
            });
        }

        function showNextSixComments(e) {
            let total = document.querySelectorAll('.user-information').length;
            let postId = e.getAttribute('data-post');
            axios.post('/show-more-comment/' + postId + '/comment/' + total)
                .then((result) => {
                    let parent = document.querySelector('.user-comment');
                    parent.innerHTML = result.data;
                    if (parent.querySelectorAll('.user-information').length == total) {
                        e.style.display = 'none';
                    }
                }).catch((err) => {
                    console.error(err);
                });
        }

        function editComment(e) {
            let comment = e.previousElementSibling.value;
            if (comment == "") {
                return false;
            }
            let commentId = e.getAttribute('data-comment');
            axios.put('/edit-comment/' + commentId, {
                content: comment
            }).then((result) => {
                document.querySelectorAll('.comment-action').forEach(function(item, index) {
                    item.style.visibility = 'visible';
                });
                e.parentElement.parentElement.parentElement.parentElement.innerHTML = result.data;
            }).catch((err) => {
                console.error(err);
            });
        }

        function deleteComment(e) {
            let commentId = e.getAttribute('data-comment');
            axios.delete('/delete-comment/' + commentId)
                .then((result) => {
                    e.parentElement.parentElement.style.display = 'none';
                }).catch((err) => {
                    console.error(err);
                });
        }

        $(function() {
            $(document).on('keydown', '.edit-comment', function(e) {
                if (e.which == 13) {
                    $(this).next().click();
                }
            })

            $(document).on('click', '.edit-button', function() {
                $(this).parents('.user-information').find('.comment-text').hide();
                $(this).parents('.user-information').find('.edit-comment').show();
                $(this).parents('.user-information').find('.edit-comment').val(
                    $(this).parents('.user-information').find('.comment-text').text()
                );
                $(this).parents('.user-information').find('.edit-comment').select();
                $(this).parents('.user-information').find('.edit-comment').focus();
                $(this).parents('.user-information').find('button').show();
                $(this).hide();
                $(this).siblings('.delete-button').hide();
                $(this).siblings('.cancel-button').show();
                $('.comment-action').css('visibility', 'hidden');
            })

            $(document).on('click', '.cancel-button', function() {
                $(this).parents('.user-information').find('.comment-text').show();
                $(this).parents('.user-information').find('.edit-comment').hide();
                $(this).parents('.user-information').find('.edit-comment').val(
                    $(this).parents('.user-information').find('.comment-text').text()
                );
                $(this).parents('.user-information').find('button').hide();
                $(this).hide();
                $(this).siblings('.delete-button').show();
                $(this).siblings('.edit-button').show();
                $('.comment-action').css('visibility', 'visible');
            })

            $(document).on('click', '.comment-action', function() {
                $(this).parents('.user-information').siblings().find('.comment-action-container').slideUp(
                    'fast');
                $(this).parents('.comment').siblings('.comment-action-container').slideToggle('fast');
            });

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
