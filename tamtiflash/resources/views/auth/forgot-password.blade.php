@extends('layouts.app')
@section('title', 'Quên mật khẩu')
@section('description', 'Nhập email của bạn để nhận liên kết đặt lại mật khẩu.')
@section('content')

<!-- Start Reset Password -->
@vite('resources/css/signUp-signIn.css')

<!-- Start Sign In -->
<main class="signIn">
    <section class="grid wide">
        <div class="row">
            <div class="col l-12 m-12 c-12">
                <div class="form__signIn">
                    <div class="signIn__title">
                        <h1 class="signIn__title-h1">Đặt lại mật khẩu</h1>
                    </div>
                    <div class="signIn__form-container">
                        <form class="signIn__form" action="{{ route('password.email') }}" method="post">
                            <div class="signIn__form-input">
                                <!-- Hiển thị lỗi -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!-- Hiển thị thông báo thành công -->
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <input class="type-input" type="email" name="email" placeholder="Nhập email của bạn" 
                                id="email" value="{{ old('email') }}" required>
                                <span class="type-text">
                                    Quay lại <a href="{{ route('login') }}">Đăng nhập</a>
                                </span>
                            </div>
                            <button class="form-sign-btn" type="submit" id="signIn-btn" name="submit">Kế tiếp</button>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
<!-- End Sign In -->
<!-- End Reset Password -->
@endsection
