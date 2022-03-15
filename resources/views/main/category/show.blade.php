@extends('main.layouts.app')
@section('content')

<div class="page-title-area bg-5"
 @if($category->category_icon) style="background-image: url({{ $category->category_icon[0] }});" @endif>
    <div class="container">
        <div class="page-title-content">
            <h1>{{ $category->name }}</h1>
        </div>
    </div>
</div>



<div class="online-courses-area mt-5">
    <div class="container">
    
        <div class="courses-search-wrap">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    {!! $category->description !!}
                </div>
            </div>
        </div>

        <div class="row mb-5">

            @foreach ($courses as $course)
            <!--  Course -->
            <div class="col-xl-4 col-md-6 mb-3">
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

            <div class="col-12">
                {{ $courses->links() }}
            </div>
        </div>
    </div>
</div>


@endsection