@extends('adminlte::auth.login')

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@stop

@section('classes_body'){{ 'login-page login-background-image-' . random_int(1, 4) }}@stop
