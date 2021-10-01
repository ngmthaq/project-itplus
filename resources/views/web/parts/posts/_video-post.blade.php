@foreach ($videoPosts as $post)
    <div class="col-4">
        <div class="post-container mb-3">
            <small class="category-type">
                {{ $post->category->name_vi }} - {{ $post->type->name_vi }}
            </small>
            <div class="img-container">
                <img src="{{ $post->cover_url }}" alt="{{ $post->cover_url }}" width="100%" height="100%">
            </div>
            <div class="content-container">
                <h5 class="title" title="{{ $post->title_vi }}">
                    <a href="{{ route('post.showPostDetail', ['post' => $post->id]) }}" class="link">{{ $post->title_vi }}</a>
                </h5>
                <p class="subtitle" title="{{ $post->subtitle_vi }}">
                    {{ $post->subtitle_vi }}
                </p>
            </div>
        </div>
    </div>
@endforeach
