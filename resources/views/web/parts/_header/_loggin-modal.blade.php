<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="login-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="login-modal-label">Đăng nhập</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="login-form" action="{{ route('login.modalLogin') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">
                            Email
                            <small class="required">*</small>
                        </label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}"
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
                            <input type="checkbox" name="remember-me" id="remember-me" class="form-check-input"
                                value="true">
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
                    <div class="form-group">
                        <hr>
                        <p class="text-center mb-3">Hoặc đăng nhập bằng</p>
                        <div class="socialite-box d-flex flex-column align-items-center justify-content-center h-100">
                            {{-- <a class="social-login social-login-sm facebook" href="{{ route('facebook.loginUsingFacebook') }}">
                                <span class="d-inline-block pr-3">
                                    <i class="fab fa-facebook-f"></i>
                                </span>
                                Đăng nhập bằng Facebook
                            </a> --}}
                            <a class="social-login social-login-sm google" href="{{ route('google.loginUsingGoogle') }}">
                                <span class="d-inline-block pr-3 blue">
                                    <i class="fab fa-google"></i>
                                </span>
                                Đăng nhập bằng Google
                            </a>
                            <a class="social-login social-login-sm github" href="{{ route('github.loginUsingGithub') }}">
                                <span class="d-inline-block pr-3">
                                    <i class="fab fa-github"></i>
                                </span>
                                Đăng nhập bằng Github
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
