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
                <form class="d-flex align-items-center">
                    <p class="comment-text">{{ $comment->content }}</p>
                    <input type="text" class="form-control edit-comment" required>
                    <button type="submit" class="btn btn-outline-none" style="display:none;">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
            @auth
                @if (Auth::user()->id == $comment->user->id)
                    <div class="comment-action text-right" style="flex: 1;">
                        <i class="fas fa-ellipsis-v"></i>
                    </div>
                @endif
            @endauth
        </div>
        <ul class="comment-action-container" style="display: none;">
            <li class="text-primary edit-button">Sửa</li>
            <li class="text-danger delete-button">Xoá</li>
            <li class="text-dark cancel-button" style="display: none">Huỷ</li>
        </ul>
    </div>
@endforeach
