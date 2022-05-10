@extends('layouts.auth')

@section('content')
    <div class="card card-body shadow p-5 border-0">
        <h2 class="h3 card-title text-muted mb-2">{{ __('Login') }}</h2>
        <h3 class="h5 card-subtitle mb-4">Realize a autenticação para prosseguir</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <x-controls.floating-label :label="__('Email Address')" name="email" type="email" autofocus required/>

            <x-controls.floating-label :label="__('Password')" name="password" type="password" required />

            <x-controls.toggle type="checkbox" :label="__('Remember Me')" name="remember" margin="mb-3" />
        
            <button class="btn btn-primary">{{ __('Login') }}</button>
        </form>
    </div>
@endsection
