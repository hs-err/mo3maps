@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="card border-dark col-lg-6 container">
        <div class="card-header">Login</div>
        <div class="card-body">
            <div class="bs-component">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">name</label>
                            <input type="text"
                                   class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   id="name" name="name" value="{{ old('name') }}"
                                   required autofocus>
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
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
                            <input
                                id="password"
                                type="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                name="password">
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password"
                                   class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                   name="password_confirmation">

                        </div>
                        <div class="form-group {{ $errors->has('captcha') ? ' has-error' : '' }}">
                            <label for="LoginCaptcha">Captcha</label>
                            @if ($errors->has('captcha'))
                                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                            @endif
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
