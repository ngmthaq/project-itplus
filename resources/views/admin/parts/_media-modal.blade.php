<section class="media-modal">
    <div class="label-container">
        <h5>Đa phương tiện</h5>
        <span class="close" style="font-size: 24px; cursor: pointer;">&times;</span>
    </div>
    <div class="media-content">
        <img width="100%" height="100%" src="" alt="Ảnh">
        <video width="100%" height="100%" src="" muted controls></video>
    </div>
    <div class="label-container mt-1">
            {{-- <span class="media-link w-100 mr-1"></span> --}}
            <input type="text" class="form-control w-100 mr-1" readonly id="media-link">
            <button class="btn btn-outline-dark" title="Copy" id="media-link-button">
                <i class="far fa-clipboard"></i>
            </button>
        {{-- <button class="btn btn-danger">Xoá</button> --}}
    </div>
</section>
