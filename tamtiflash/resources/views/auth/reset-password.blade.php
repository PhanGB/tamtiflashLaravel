


@extends('layouts.app')
@section('title', 'Đặt lại mật khẩu')
@section('description', 'ThamTiFlash - Đặt lại mật khẩu của bạn')
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
                        <form class="signIn__form" action="{{ route('password.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="signIn__form-input">
                                <input class="type-input" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" readonly>
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
                                <input class="type-input" id="password" type="password" name="password" required autocomplete="new-password" placeholder="Mật khẩu mới">
                                 <input class="type-input" id="password" d="password_confirmation"                               type="password"
                                name="password_confirmation" required autocomplete="new-password" placeholder="Xác nhận mật khẩu mới" />
                            </div>
                            <button class="form-sign-btn" type="submit" id="signIn-btn" name="submit">Reset password</button>
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

