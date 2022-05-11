@extends('layouts.auth')

@section('content')
    <div class="card card-body shadow pt-4 px-5 pb-5 border-0">
        <h2 class="h3 card-title text-muted mb-2">{{ __('Login') }}</h2>
        <h3 class="h5 card-subtitle mb-4">Realize a autenticação para prosseguir</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <x-controls.floating-label :label="__('Email Address')" name="email" type="email" autofocus />

            <x-controls.floating-label :label="__('Password')" name="password" type="password" />

            <x-controls.toggle type="checkbox" :label="__('Remember Me')" name="remember" />
        
            <button class="btn btn-primary mt-3">{{ __('Login') }}</button>
        </form>
    </div>
@endsection
