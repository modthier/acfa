@extends('admin.layouts.login-app')
@section('content')


<h5 class="mb-0">Forgot your password?</h5><small>Enter your email and we'll send you a reset link.</small>
<x-auth-session-status class="mb-4" :status="session('status')" />
@if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
@endif
<form method="POST" action="{{ route('admin.password.email') }}" class="mt-4">
    @csrf
    <input class="form-control" type="email" name="email" placeholder="Email address">
    <div class="mb-3"></div>
    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Send reset link</button>
</form>



@endsection