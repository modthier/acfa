@extends('main.layouts.app')
@section('content')

<div class="container">
    <!-- ======= instructor Details  ======= -->
<div class="instructors-details-area bg-light mt-5 mb-5">
   <div class="container">
   <div class="row">
   <div class="col-lg-4">
   <div class="instructors-img">
   <img src="{{ $trainer->trainer_image[0] }}" alt="{{ $trainer->name }}">
   </div>
   </div>
   <div class="col-lg-8">
   <div class="instructors-content">
   <h1>{{ $trainer->name }}</h1>
 
   @if($trainer->bio)
   <h3>{{ __('body.trainer_about') }} :</h3>
   {!! $trainer->bio !!}
   @endif
   @if($trainer->work_experience)
   <h3>{{ __('body.work_experience') }}:</h3>
   {!! $trainer->work_experience !!}
   @endif

   </div>

   </div>
   </div>

   <h3 class="text-center mt-5">{{ __('body.courses') }}</h3>
   <div class="row mt-3">
    @foreach ($trainer->courses as $course)
    <div class="col-xl-4 col-md-6">
        <div class="box single-courses-item shadow" style="background: #f9f9f9;">
            <div class="courses-img">
                <a href="{{ LaravelLocalization::localizeUrl(route('main.course.show',$course->slug)) }}">
                    @if($course->course_icon)
                       <img src="{{ $course->course_icon[0] }}" alt="{{ $course->name }}">
                    @else 
                      <img src="{{ asset('main/images/courses/courses-1.jpg') }}" alt="{{ $course->name }}">
                    @endif
                </a>
            </div>
            <div class="courses-content">
               
                <h3>
                <a href="{{ LaravelLocalization::localizeUrl(route('main.course.show',$course->slug)) }}">
                    {{ $course->name }}
                </a>
                </h3>
                <ul class="courses-time d-flex justify-content-between">
                    <li>
                    <i class="ri-time-fill"></i>
                     {{ $course->hours }} {{ __('body.hours') }}
                    </li>
                    <li>
                    <i class="ri-vidicon-fill"></i>
                        {{ $course->weeks }} {{ __('body.weeks') }}
                    </li>
                    <li>
                    <i class="ri-list-check"></i>
                        {{ $course->days_in_week }} {{ __('body.days_in_week') }}
                    </li>
                </ul>
            </div>
            <ul class="courses-fee d-flex">
            <li>
            
            </li>
            <li>
            <a href="{{ LaravelLocalization::localizeUrl(route('main.course.show',$course->slug)) }}">
                @if(app()->getLocale() == 'ar')
                <i class="bi bi-arrow-bar-left"></i>
                @else 
                <i class="bi bi-arrow-bar-right"></i>
                @endif
                {{ __('body.more') }}
             
            </a>
            </li>
            </ul>
        </div>
    </div>
    @endforeach
   </div>

   </div>
   </div>

<!-- End instructor Details-->
</div>
@endsection