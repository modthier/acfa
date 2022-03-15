@extends('admin.layouts.login-app')
@section('content')

<h5 class="text-center">Reset new password</h5>
<form method="POST" action="{{ route('admin.password.update') }}" class="mt-3">
    @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">
    <div class="mb-3">
        <label class="form-label"></label>
        <input class="form-control" name="email" type="email" value="{{ old('email', $request->email) }}" required autofocus placeholder="Email">
    </div>
    <div class="mb-3">
        <label class="form-label"></label>
        <input class="form-control" type="password" name="password" required  placeholder="New Password">
    </div>
    <div class="mb-3">
        <input class="form-control" type="password"  name="password_confirmation" required placeholder="Confirm Password">
    </div>
    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Set password</button>
</form>


@endsection