@foreach ($casualPosts as $post)
    <div class="col-12 col-md-6 col-xl-4 casual-posts">
        <div class="post-container mb-3">
            <small class="category-type">
                {{ $post->category->name_vi }} - {{ $post->type->name_vi }}
            </small>
            <div class="img-container">
                <img class="lazyload" data-src="{{ $post->cover_url }}" src="{{ $post->cover_url }}"
                    alt="{{ $post->cover_url }}" width="100%" height="100%">
            </div>
            <div class="content-container">
                <h5 class="title" title="{{ $post->title_vi }}">
                    <a href="{{ route('post.showPostDetail', ['post' => $post->id]) }}"
                        class="link">{{ $post->title_vi }}</a>
                </h5>
                <p class="subtitle" title="{{ $post->subtitle_vi }}">
                    {{ $post->subtitle_vi }}
                </p>
                <small class="mb-2 d-block">Đăng bài:
                    {{ date('d/m/Y', strtotime($post->created_at)) }}</small>
            </div>
        </div>
    </div>
@endforeach
