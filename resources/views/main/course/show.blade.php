@extends('main.layouts.app')
@section('content')


<div class="page-title-area bg-5">
  <div class="container">
      <div class="page-title-content">
         <h1>{{ $course->name }}</h1>
      </div>
  </div>
</div>

<div class="courses-details-area ptb-100">
    <div class="container">
    <div class="row">
    <div class="col-lg-8">
    <div class="overview">
    <div class="tab">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
    <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab"
     aria-controls="overview" aria-selected="true">{{ __('body.overview') }}</button>
    </li>
    <li class="nav-item" role="presentation">
    <button class="nav-link" id="instructor-tab" data-bs-toggle="tab" data-bs-target="#instructor" type="button" 
    role="tab" aria-controls="instructor" aria-selected="false">{{ __('body.trainer') }}</button>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
    <div class="overview-content">
    <h3>{{ __('body.course_desc') }}</h3>
    {!!  $course->description !!}
    
    </div>
    </div>
    <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
    <div class="instructor-content mb-0">
    <div class="row align-items-center">
    <div class="col-lg-5">
    <div class="instructors-img mb-5">
     <img src="{{ $course->trainer->trainer_image[0] }}" alt="{{ $course->trainer->name }}">
    </div>
    </div>
    <div class="col-lg-7">
    <div class="instructors-content mt-3">
    <h3>{{ $course->trainer->name }}</h3>

  
   
    </div>
    </div>
    </div>
    </div>
    </div>
   

    </div>
    </div>
    </div>
    </div>
    <div class="col-lg-4">
    <div class="widget-sidebar ml-15">
    <div class="sidebar-widget video-courses mb-0">
    <div class="courses-video-img">
    @if($course->course_icon)
        <img src="{{ $course->course_icon[0] }}" alt="{{ $course->name }}">
     @else 
       <img src="{{ asset('main/images/courses/courses-1.jpg') }}" alt="{{ $course->name }}">
     @endif
   
    </div>
    <div class="price-status"> 
      <div class="course-details">
        {{ __('body.price') }} <span class="course-item-child">{{ $course->price }}$</span>
      </div>
      <div class="course-details">
        {{ __('body.trainer') }} <span class="course-item-child">{{ $course->trainer->name }}</span>
      </div>

      <div class="course-details">
        {{ __('body.duration') }} <span class="course-item-child">{{ $course->weeks }} {{ __('body.weeks') }}</span>
      </div>
      <div class="course-details">
        {{ __('body.hour') }} <span class="course-item-child">{{ $course->hours }} {{ __('body.hours') }}</span>
      </div>
     
    </div>
    <div style="padding:10px 30px 30px 30px;">
      @if(Auth::guest())
      <a href="{{ route('login') }}">{{ __('navbar.login') }}</a>
       {{ __('body.or') }}
      <a href="{{ route('register') }}">{{ __('navbar.register') }}</a>
      @else
       @livewire('course-subscription', ['course_id' => $course->id])

      @endif
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- End Courses Details-->


@endsection