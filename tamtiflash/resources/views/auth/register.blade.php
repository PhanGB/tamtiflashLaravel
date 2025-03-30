@extends('layouts.app')
@section('title', 'Đăng ký tài khoản')
@section('description', 'Đăng ký tài khoản mới trên Tamtiflash')
@section('content')


<!-- Start Sign Up -->
 @vite('resources/css/signUp-signIn.css')
<main class="signUp">
    <section class="grid wide">
        <div class="row">
            <div class="col l-12 m-12 c-12">
                <div class="form__signUp">
                    <div class="signUp__title">
                        <h1 class="signUp__title-h1">Đăng ký</h1>
                    </div>
                    <div class="signUp__form-container">
                        <form class="signUp__form" action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="signUp__form-input">
                                <input class="type-input" type="text" name="name" placeholder="Tên người dùng" 
                                    id="signUp__name-txt" value="{{ old('name') }}">
                                @error('name') <span class="error">{{ $message }}</span> @enderror

                                <input class="type-input" type="email" name="email" placeholder="Email"
                                    id="signUp__email-txt" value="{{ old('email') }}">
                                @error('email') <span class="error">{{ $message }}</span> @enderror

                                <input class="type-input" type="text" name="phone" placeholder="Số điện thoại"
                                    id="signUp__phone-txt" value="{{ old('phone') }}">
                                @error('phone') <span class="error">{{ $message }}</span> @enderror

                                <input class="type-input" type="password" name="password" placeholder="Mật khẩu" 
                                    id="signUp__password-pass">
                                @error('password') <span class="error">{{ $message }}</span> @enderror

                                <input class="type-input" type="password" name="password_confirmation" 
                                    placeholder="Xác nhận mật khẩu" id="signUp__repass-pass">

                                <span class="type-text">
                                    Bạn đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a>
                                </span>
                            </div>

                            <input class="form-sign-btn" type="submit" value="Đăng ký" id="signUp-btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End Sign Up -->
@endsection