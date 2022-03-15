@extends('layouts.app-login')
@section('content')
   <div class="card-body">

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="sr-only">Password</label>

                <x-input id="password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit"
             value="{{ __('Confirm') }}">

        </form>

    </div>
@endsection
