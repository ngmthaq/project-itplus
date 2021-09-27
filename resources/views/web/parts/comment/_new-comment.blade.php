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
