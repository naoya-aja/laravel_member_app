@extends('adminlte::page')

@section('title', '登録情報変更')

@section('content_header')
<h1>登録情報変更</h1>
@stop
@section('classes_body', 'hold-transition')

@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{-- {{ session('status') }} --}}
    更新しました。
</div>
@endif


<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<div class="card card-primary">
<form method="post" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')

    <div class="card-body">
        {{-- Name field --}}
        <div class="form-group">
            <label for="inputName">{{ __('adminlte::adminlte.name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                id="inputName" placeholder="{{ __('adminlte::adminlte.name') }}"
                value="{{ old('name', $user->name) }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="row">
        <div class="col-sm-6">
            {{-- Last Name field --}}
            <div class="form-group">
                <label for="inputLastName">{{ __('adminlte::adminlte.last_name') }}</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                    id="inputLastName" placeholder="{{ __('adminlte::adminlte.last_name') }}"
                    value="{{ old('last_name', $user->last_name) }}" autofocus>
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6">
            {{-- First Name field --}}
            <div class="form-group">
                <label for="inputFirstName">{{ __('adminlte::adminlte.first_name') }}</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                    id="inputFirstName" placeholder="{{ __('adminlte::adminlte.first_name') }}"
                    value="{{ old('first_name', $user->first_name) }}">
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        </div>

        {{-- Email field --}}
        <div class="form-group">
            <label for="exampleInputEmail1">{{ __('adminlte::adminlte.email') }}</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                id="exampleInputEmail1" placeholder="{{ __('adminlte::adminlte.email') }}"
                value="{{ old('email', $user->email) }}">
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">更新</button>
    </div>
</form>
</div>
@stop
