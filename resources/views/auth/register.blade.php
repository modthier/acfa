@extends('layouts.app-login')
@section('content')
   <div class="card-body">

 
      
    <p class="login-card-description">{{ __('body.learn') }}</p>  
          <x-auth-validation-errors class="mb-4" :errors="$errors" />
      
        <form method="POST" action="{{ route('register') }}" role="form" class="form" 
        style="width:100%; max-width:100%;">
            @csrf
          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <input name="name" type="text" class="form-control form-control-lg form-control-a" placeholder="{{ __('form.name') }}" required>
              </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="{{ __('form.email') }}" required>
                </div>
              </div>
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <input name="phone" type="number" 
                class="form-control form-control-lg form-control-a" placeholder="{{ __('form.phone') }}" required>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <input name="whatsapp_phone" type="number" 
                class="form-control form-control-lg form-control-a" placeholder="{{ __('form.whatsapp') }}" required>
              </div>
            </div>
    
           
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <input type="password" name="password" 
                class="form-control form-control-lg form-control-a" placeholder="{{ __('form.password') }}" required>
              </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input type="password" name="password_confirmation" 
                  class="form-control form-control-lg form-control-a" placeholder="{{ __('form.confirm_password') }}" required>
                </div>
              </div>
            
              
            <div class="col-md-6 mb-3">
                <div class="form-group">
                 <select id="my-select" class="form-control" name="country_id">
                   <option>{{ __('form.country') }}</option>
                   @foreach ($countries as $country)
                    <option value="{{$country->id }}">{{ $country->name }}</option>
                   @endforeach
                 </select>
               
                </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="form-group">
               <select id="my-select" class="form-control" name="interest" required>
                 <option>{{ __('form.interest') }}</option>
                  @foreach ($courses as $course)
                      <option value="{{ $course->id }}">{{ $course->name }}</option>
                  @endforeach
               </select>
             
              </div>
            </div>
            
          
          </div>
          <input  class="btn btn-block login-btn mb-4" type="submit" value="{{ __('navbar.register') }}">
        </form>
   
   
  </div>
  @endsection

   
            

