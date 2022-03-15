@extends('main.layouts.app')
@section('content')


<div class="page-title-area bg-5">
  <div class="container">
  <div class="page-title-content">
  <h2>{{ __('navbar.about') }}</h2>

  </div>
  </div>
  </div>
  
  <!-- ======= about  ======= -->
 
  <section class="about-area my-5 py-5">
      <div class="container">
      <div class="row align-items-center">
      <div class="col-lg-6 col-md-6">
      <div class="about-image">
          <img src="{{ asset('images/about.jpg') }}" class="shadow mb-2" alt="image">
      
      <!-- <img src="images/3-01.png" class="shadow" alt="image"> -->
      </div>
      </div>
      <div class="col-lg-6 col-md-6">
      <div class="about-content">
      <h2>{{ __('body.ins_name') }}</h2>
      <h6>{{ __('body.overview') }}</h6>
      <p>
        {{ __('content.about_page') }}
      </p>
     
      <div class="features-text">
      <p>{{ __('content.edu') }}</p>
      </div>
      </div>
      </div>
      </div>
    
      </div>
      </section>

  @endsection