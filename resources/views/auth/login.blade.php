@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                {{-- @error('email') --}}
                            <div class="invalid-feedback">
                                {{-- {{ $message }} --}}
                                Email yang anda masukkan salah!!
                            </div>
                        {{-- @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                <div class="invalid-feedback">
                                    {{-- {{ $message }} --}}
                                    Password yang anda masukkan salah!!
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="captcha" class="col-md-4 col-form-label text-md-right">
                                {{ __('Security Image') }}
                            </label>

                            <div class="col-md-6">
                                {!! Captcha::img('flat', ['id' => 'captcha_img', 'class' => 'captcha-image', 'onclick' => 'this.src = "/captcha/" + Math.random()', 'title' => 'Klik untuk refresh captcha']) !!}

                                <div class="invalid-feedback">
                                    {{-- {{ $message }} --}}
                                    Captcha Salah!!
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="captcha" class="col-md-4 col-form-label text-md-right"> {{ __('Input karakter yang muncul pada tampilan di atas ') }}

                            </label>

                            <div class="col-md-6">
                                <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" name="captcha" required autocomplete="current-captcha">

                                <div class="invalid-feedback">
                                    {{-- {{ $message }} --}}
                                    Captcha Salah!!
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
