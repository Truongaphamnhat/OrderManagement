<p> Xin Chào! <b>{{ $user->name }}</b></p>
<p> Chào mừng bạn đến với hệ thống quản lý đơn hàng cho doanh nghiệp CRM, tài khoản của bạn vừa được tạo, xin vui lòng cập nhật và kích hoạt tài khoản <a href="{{ route('get.verify_account', ['email' => $user->email]) }}">tại đây</a></p>

{{-- <p> Chào mừng bạn đến với hệ thống quản lý đơn hàng cho doanh nghiệp CRM, tài khoản của bạn vừa được tạo, xin vui lòng cập nhật và kích hoạt tài khoản <a href="{{ $link }}">tại đây</a></p> --}}