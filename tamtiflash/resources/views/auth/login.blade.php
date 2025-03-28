@extends('layouts.app')
@section('title', 'Đăng nhập')
@section('description', 'Đăng nhập vào tài khoản của bạn để trải nghiệm dịch vụ tốt nhất từ chúng tôi.')
@section('content')

    <!-- Start Sign In -->
    @vite('resources/css/signUp-signIn.css')
    <main class="signIn">
        <section class="grid wide">
            <div class="row">
                <div class="col l-12 m-12 c-12">
                    <div class="form__signIn">
                        <div class="signIn__title">
                            <h1 class="signIn__title-h1">Đăng nhập</h1>
                        </div>
                        <div class="signIn__form-container">
                            <form class="signIn__form" action="{{ route('login') }}" method="POST">
                                @csrf <!-- CSRF Token -->

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
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif


                                    <input class="type-input" type="text" name="email" placeholder="Email" id="email"
                                        value="{{ old('email') }}" required>

                                    <input class="type-input" type="password" name="password" placeholder="Mật khẩu"
                                        id="password" required>

                                    <div class="remember-me">
                                        <input type="checkbox" name="remember" id="remember">
                                        <label for="remember">Ghi nhớ đăng nhập</label>
                                    </div>
                                    <br>
                                    <!-- <div class="forgot-password">
                                        <a href="" class="type-text">Quên mật khẩu?</a>
                                    </div> -->
                                    <span class="type-text">
                                        <a href="{{ route('password.request') }}">Quên mật khẩu</a>
                                    </span>
                                    <div class="signIn__form-text">
                                        <!-- Hiển thị thông báo thành công -->
                                        @if (session('status'))
                                            <div class="alert alert-success">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <!-- Hiển thị thông báo lỗi -->
                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                        <!-- Hiển thị thông báo thành công -->
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        <span class="type-text">Bạn chưa có tài khoản? <a
                                                href="{{ route('register') }}">Đăng ký</a></span> <br>
                                    </div>
                                    <br>
                                    <input class="form-sign-btn" type="submit" value="Đăng nhập" id="signIn-btn">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End Sign In -->
@endsection