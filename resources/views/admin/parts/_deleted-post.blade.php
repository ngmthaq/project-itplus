    {{-- Xoá bài viết bằng axios --}}
    <th scope="row">P{{ $post->id }}</th>
    <td class="title_vi">{{ $post->title_vi }}</td>
    <td>{{ $post->category->name_vi }}</td>
    <td>{{ count($post->comments) }}</td>
    <td>{{ date('d/m/Y H:i', strtotime($post->created_at)) }}</td>
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
            <a href="javascript:void(0)" data-id="{{ $post->id }}" class="btn btn-sm btn-outline-danger"
                title="Xoá bài viết" onclick="deletePost(this)">
                <i class="far fa-trash-alt"></i>
            </a>
        @endif
    </td>
