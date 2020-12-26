@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2>タスク管理アプリにログイン</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('languages.E-Mail Address') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('languages.Password') }}</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="text-right">
                <div class="col-sm-8 col-md-8">
                    <button type="submit" class="btn btn-secondary">
                        {{ __('languages.Login') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection