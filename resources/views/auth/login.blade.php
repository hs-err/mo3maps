@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border-dark col-lg-6 container">
            <div class="card-header">Login</div>
            <div class="card-body">
                <div class="bs-component">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Email address</label>
                                <input type="email"
                                       class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required autofocus>
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password">
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="LoginCaptcha">Captcha</label>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                        </fieldset>
                    </form>
                </div>
                <div class="text-primary">
                    <a class="btn btn-dark float-left" href="{{ route('register') }}">register</a>
                    <a class="btn btn-dark float-right" href="{{ route('password.request') }}">Have some Problem?</a>
                </div>
            </div>
        </div>
    </div>
@endsection
