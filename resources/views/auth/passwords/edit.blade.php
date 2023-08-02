@extends('adminlte::page')

@section('content_header')
<h1>パスワード変更</h1>
@stop
@section('classes_body', 'hold-transition')

@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{-- {{ session('status') }} --}}
    パスワードを変更しました。
</div>
@endif

<div class="card card-primary">
<form action="{{ route('password.update') }}" method="post">
    @csrf
    @method('put')

    <div class="card-body">
        {{-- Current Password field --}}
        <div class="form-group">
            <div class="input-group mb-3 col-sm-8">
                <input type="password" id="current_password" name="current_password"
                    class="form-control @if($errors->updatePassword->has('current_password')) is-invalid @endif"
                    placeholder="現在のパスワード">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                    </div>
                </div>
                @if($errors->updatePassword->has('current_password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->updatePassword->first('current_password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        {{-- New Password field --}}
        <div class="form-group">
            <div class="input-group mb-3 col-sm-8">
                <input type="password" id="password" name="password"
                    class="form-control @if($errors->updatePassword->has('password')) is-invalid @endif"
                    placeholder="新しいパスワード">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                    </div>
                </div>
                @if($errors->updatePassword->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->updatePassword->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        {{-- Confirm Password field --}}
        <div class="form-group">
            <div class="input-group mb-3 col-sm-8">
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="form-control @if($errors->updatePassword->has('password_confirmation')) is-invalid @endif"
                    placeholder="{{ __('Confirm Password') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                    </div>
                </div>
                @if($errors->updatePassword->has('password_confirmation'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->updatePassword->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">更新</button>
    </div>
</form>
</div>
@stop
