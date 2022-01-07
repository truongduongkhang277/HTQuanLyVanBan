@extends('layouts.app')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <h1>Quên mật khẩu Email</h1>

            Bạn có thể đặt lại mật khẩu thông qua đường dẫn sau:
            <a href="{{ route('ResetPasswordGet', $token) }}">Đặt lại mật khẩu</a>
        </div>
    </main>
@endsection
