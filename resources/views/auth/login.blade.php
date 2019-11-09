<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Строй компания</title>

    <link href="{{mix('css/admin-app.css')}}" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        .card-header{
            padding: 1rem 0 2rem 2rem;
            font-size: 1.5rem;
        }
        .btn.btn-primary{
            background-color: #ef6c00 !important;
            height: 36px;
            min-width: 64px;
            padding: 0 16px;
            color: #FFFFFF;
            align-items: center;
            border-radius: 4px;
            display: inline-flex;
            flex: 0 0 auto;
            font-weight: 500;
            letter-spacing: 0.0892857143em;
            justify-content: center;
            max-width: 100%;
            outline: 0;
            position: relative;
            text-decoration: none;
            text-indent: 0.0892857143em;
            text-transform: uppercase;
            transition-duration: 0.28s;
            transition-property: box-shadow, transform, opacity;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            vertical-align: middle;
            white-space: nowrap;
        }
    </style>
</head>
<body>
<div class="container" style="height: 100%;">
    <div class="row justify-content-center" style="display: flex;
    align-items: center;
    height: 100%;">
        <div class="col-md-5" style="    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 1rem 1rem 3rem;">
            <div class="card">
                <div class="card-header">{{ __('auth.login')}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('auth.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('auth.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ 'Запомнить меня' }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4" style="    justify-content: center;
    display: flex;">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('auth.btnLogin') }}
                                </button>

                                {{--@if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
