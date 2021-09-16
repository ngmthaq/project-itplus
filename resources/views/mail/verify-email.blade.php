<h1>Xác thực tài khoản The Vietnam Newspaper</h1>
<p>
    Bạn vừa đăng ký thành công tài khoản tại The Vietnam Newspaper, 
    để sử dụng được tài khoản hãy thực thiện bước cuối cùng này!
</p>
<p>Nhấn vào <a href="{{ route('verify', ['user' => $remember_token]) }}">đây</a> để xác thực email của bạn hoặc nhấn vào đường link dưới đây:</p>
<a href="{{ route('verify', ['user' => $remember_token]) }}">{{ route('verify', ['user' => $remember_token]) }}</a>
<br><br><small>Thông tin của bạn sẽ được chúng tôi bảo mật hết sức có thể</small>
<br><br><small style="color: red">Vui lòng không chia sẻ liên kết xác thực cho bất kì ai</small>
