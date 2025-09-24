@extends('layouts.app')

@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
        background-color: #f0f2f5;
    }

    .login-container {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .login-card {
        display: flex;
        flex-direction: row;
        width: 100%;
        max-width: 960px;
        height: 580px;
        background-color: #fff;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .login-left {
        flex: 1;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .login-left .logo {
        text-align: center;
        margin-bottom: 30px;
    }

    .login-left .logo img {
        width: 80px;
    }

    .form-control {
        border-radius: 10px;
        height: 50px;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(86, 119, 146, 0.25);
        border-color: #567792;
    }

    .btn-login {
        height: 50px;
        border-radius: 10px;
        background-color: #6d86a3;
        border: none;
    }

    .btn-login:hover {
        background-color: #5a708b;
    }

    .login-right {
        flex: 1;
        background: url('{{ asset('images/login-bg.webp') }}') no-repeat center center/cover;
        position: relative;
    }

    .overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.3);
    }

    .return-link {
        position: absolute;
        bottom: 20px;
        right: 20px;
        color: #fff;
        font-weight: 500;
        text-decoration: none;
        z-index: 2;
        transition: all 0.3s;
    }

    .return-link:hover {
        text-decoration: underline;
        transform: translateX(3px);
    }

    .form-check-label {
        font-size: 0.9rem;
    }

    .invalid-feedback {
        display: block;
    }

    @media (max-width: 768px) {
        .login-card {
            flex-direction: column;
            height: auto;
        }

        .login-right {
            height: 200px;
        }
    }
</style>

<div class="login-container">
    <div class="login-card">
        <!-- Left Form -->
        <div class="login-left">
            <div class="logo">
                <img src="https://s.w.org/style/images/about/WordPress-logotype-alternative.png" alt="Logo">
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autocomplete="email"
                           autofocus
                           placeholder="Your username or e-mail">

                    @error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password"
                           required
                           autocomplete="current-password"
                           placeholder="Your password">

                    @error('password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                           {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="mb-3 d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a class="text-muted small" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-login w-100">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Right Image -->
        <div class="login-right">
            <div class="overlay"></div>
            <a href="{{ url('/') }}" class="return-link">Return to website →</a>
        </div>
    </div>
</div>
@endsection
