<div class="my-toast-container">
    {{-- {{ ddd(session('success')) }} --}}
    @if (session('error'))
        <div class="my-toast my-toast-error">
            <p>{{ session('error') }}</p>
            <span><i class="fas fa-times"></i></span>
        </div>
    @endif
    @if (session('success'))
        <div class="my-toast my-toast-success">
            <p>{{ session('success') }}</p>
            <span><i class="fas fa-times"></i></span>
        </div>
    @endif
</div>