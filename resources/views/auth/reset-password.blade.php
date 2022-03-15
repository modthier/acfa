@extends('layouts.app-login')
@section('content')
   <div class="card-body">

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="form-group">
                <label for="email" class="sr-only">__('Email')</label>

                <x-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="sr-only">
                    {{ __('Password') }}
                </label>

                <x-input id="password" class="form-control" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation" class="sr-only">
                    {{ __('Confirm Password') }}
                </label>

                <x-input id="password_confirmation" class="form-control"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <input name="login" id="login" class="btn btn-block login-btn mb-4" 
            type="submit" value="{{ __('Reset Password') }}">
        </form>
    </div>
    @endsection
