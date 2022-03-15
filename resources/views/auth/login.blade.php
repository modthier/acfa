@extends('layouts.app-login')
@section('content')
   <div class="card-body">
    
   <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        

       <p class="login-card-description">{{ __('body.signin') }}</p>  
        <form method="POST" action="{{ route('login') }}">
        @csrf
            <div class="form-group">
            <label for="email" class="sr-only">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="{{ __('form.email') }}">
            </div>
            <div class="form-group mb-4">
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control" required autocomplete="current-password"  placeholder="***********">
            </div>
            <div class="form-group mb-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('body.remember') }}</span>
            </label>
        </div>
            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit"
             value="{{ __('navbar.login') }}">
        </form>
        
        @if (Route::has('password.request'))
        <a class="forgot-password-link" href="{{ route('password.request') }}">
            {{ __('body.forgot') }}
        </a>
        @endif
        <p class="login-card-footer-text">{{ __('body.noaccount') }} <a href="{{ route('register') }}" class="text-reset">{{ __('body.register_now') }}</a></p>
    </div>
@endsection