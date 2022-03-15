@extends('admin.layouts.login-app')
@section('content')

<div class="row flex-between-center mb-2">
    <div class="col-md-12">
      <h5>Log in</h5>
      @if(Session::has('admin-without-login'))
            <div class="alert alert-warning alert-dismissable fade show" role="alert">
                <strong>
                    {{ session::get('admin-without-login') }}
                </strong>
                
            </div>
        @endif
        @if(Session::has('login-failed'))
        <div class="alert alert-danger alert-dismissable fade show text-dark" role="alert">
            <strong>
                {{ session::get('login-failed') }}
            </strong>
        </div>
    @endif
    </div>
    
   
  </div>
  <form action="{{ route('admin.login') }}" method="post">
    @csrf
    <div class="mb-3">
      <input class="form-control" type="email" name="email" placeholder="Email address">
    </div>
    <div class="mb-3">
      <input class="form-control" type="password" name="password" placeholder="Password">
    </div>
    <div class="row flex-between-center">
      <div class="col-auto">
        <div class="form-check mb-0">
          <input class="form-check-input" type="checkbox" id="basic-checkbox" checked="checked">
          <label class="form-check-label mb-0" for="basic-checkbox">Remember me</label>
        </div>
      </div>
      <div class="col-auto"><a class="fs--1" href="{{ route('admin.password.request') }}">Forgot Password?</a></div>
    </div>
    <div class="mb-3">
      <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Log in</button>
    </div>
  </form>
    
@endsection