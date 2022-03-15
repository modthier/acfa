
@extends('main.layouts.app')
@section('content')

<div class="intro intro-carousel swiper position-relative">

  <div class="swiper-wrapper">
    @foreach ($sliders as $slider)
    <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url({{ $slider->slider_image[0] }})">
      <div class="overlay overlay-a"></div>
      <div class="intro-content display-table">
        <div class="table-cell">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="intro-body">
                  <h1 class="intro-title mb-4 ">
                    @if($slider->hasTranslation(app()->getLocale()))
                      {{ $slider->translate()->title }}
                    @endif
                  </h1>
                  <div style="font-size:1.2em;">
                    @if($slider->hasTranslation(app()->getLocale()))
                      {!! $slider->translate()->content !!}
                    @endif
                    
                  </div>
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    
   
  </div>
  
</div><!-- End Intro Section -->

<div class="container my-5">
  <div class="row">
    <section class="feature-section-three">
      <div class="pattern-layer-one" ></div>
      <div class="pattern-layer-three" ></div>
      <div class="auto-container">
        <div class="row clearfix" style="--bs-gutter-x: 0;">
        
          <!-- Title Column -->
          <div class="title-column col-lg-5 col-md-12 col-sm-12">
            <div class="inner-column">
              <h2>{{ __('content.offer_title') }}</h2>
              <div class="text">{{ __('content.offer') }}</div>
              <!-- Button Box -->
            
            </div>
          </div>
          
          <!-- Blocks Column -->
          <div class="blocks-column col-lg-7 col-md-12 col-sm-12">
            <div class="inner-column">
              
              <div class="row clearfix">
                
                <!-- Feature Block Five -->
                <div class="feature-block-five col-lg-6 col-md-6 col-sm-12">
                  <div class="inner-box">
                    <a href="" class="overlay-box"></a>
                    <div class="icon flaticon-teaching"><i class="bi bi-clipboard-data"></i></div>
                    <h4>{{ __('content.prp_ielte') }}</h4>
                  </div>
                </div>
                
                <!-- Feature Block Five -->
                <div class="feature-block-five col-lg-6 col-md-6 col-sm-12">
                  <div class="inner-box">
                    <a href="" class="overlay-box"></a>
                    <div class="icon flaticon-graduation-cap"><i class="bi bi-calendar3"></i></div>
                    <h4>{{ __('content.english_beg') }}</h4>
                  </div>
                </div>
                
                <!-- Feature Block Five -->
                <div class="feature-block-five col-lg-6 col-md-6 col-sm-12">
                  <div class="inner-box">
                    <a href="" class="overlay-box"></a>
                    <div class="icon flaticon-bullhorn"><i class="bi bi-x-diamond"></i></div>
                    <h4> {{ __('content.adv_eng') }} </h4>
                  </div>
                </div>
                
                <!-- Feature Block Five -->
                <div class="feature-block-five col-lg-6 col-md-6 col-sm-12">
                  <div class="inner-box">
                    <a href="" class="overlay-box"></a>
                    <div class="icon flaticon-padlock-1"><i class="bi bi-arrow-counterclockwise"></i></div>
                    <h4>{{ __('content.lifetime') }}</h4>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>
  </div>
</div>
<!-- End Feature Section Three -->
<!--======= Course We Offer ======-->
<section class="my-5">
<div class="container">
  <div class="row">
    <h2 class="text-center py-5 mb-5">{{ __('content.feature') }}</h2>
    <!-- 1 -->
    <div class="col-md-4">
      <div class="course course-1">
        <div class="course-image mb-4">
          <div class="d-flex aligin-item-center justify-content-center">
            <i class="bi bi-badge-8k"></i>
          </div>
          
        </div>
        <div  class="course-info text-muted">
          <h3>{{ __('content.live') }}</h3>
          <p>{{ __('content.live_content') }}</p>
          <div class="social-touch">
           
          </div>
        </div>
      </div>
    </div>
    <!-- 2 -->
    <div class="col-md-4">
<div class="course course-1">
<div class="course-image mb-4">
  <div class="d-flex aligin-item-center justify-content-center">
    <i class="bi bi-tags"></i>
  </div>
</div>
<div class="course-info text-muted">
  <h3>{{ __('content.personal') }}</h3>
  <p>{{ __('content.personal_content') }}</p>
  <div class="social-touch">
    
  </div>
</div>
</div></div>
<!-- 3 -->
<div class="col-md-4">
<div class="course course-1">
  <div class="course-image mb-4">
    <div class="d-flex aligin-item-center justify-content-center">
      <i class="bi bi-x-diamond"></i>
    </div>
  </div>
  <div class="course-info text-muted">
    <h3>{{ __('content.enjoy') }}</h3>
    <p>{{  __('content.enjoy_content') }}</p>
    <div class="social-touch">
      
    </div>
  </div>
</div>
</div>
<!-- 4 -->

  </div>
</div>
</section>

<!--End Course we Offer-->

<!--====== Feedback section ======-->
<section class="funfacts-and-feedback-area bg-f8e8e9 py-5">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-md-12">
<div class="feedback-slides-content">
<h2>{{ __('content.start') }}</h2>
<p class="text-muted">{{ __('content.start_content') }}</p>

<div class="feedback-info">
<p>{{ __('content.member') }} <a href="">{{ __('content.register') }}</a></p>
</div>
</div>
</div>
<div class="col-lg-6 col-md-12">
<div class="funfacts-list">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="single-funfacts-box">
<h3>
  <span class="target">100%</span>
</h3>
<p>Finished Sessions</p>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="single-funfacts-box">
<h3><span class="odometer" data-count="3279">00</span></h3>
<p>Enrolled Learners</p>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="single-funfacts-box">
<h3><span class="odometer" data-count="250">00</span></h3>
<p>Online Instructors</p>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="single-funfacts-box">
<h3><span class="odometer" data-count="100">00</span>%</h3>
<p>Satisfaction Rate</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<!-- Newsletter Section  -->
<section class="newsletter-section-three">
<div class="auto-container">
  <div class="inner-container">
    
    <div class="title-box">
      <div class="title">{{ __('content.newsletter') }}</div>
      <h2>{{ __('content.quickly') }} <br> {{ __('content.event_news') }}</h2>
    </div>
    <!-- Newsletter Form -->
    <div class="newsletter-form-three">
      <form method="post" action="">
        <div class="form-group">
         
          
          <input type="email" name="email" value="" placeholder="" required>
          <button type="submit" class="flaticon-next-2 submit-btn" @if(app()->getLocale() == 'ar') style="left:4px; right:auto;"  @endif><i class="bi bi-chevron-right"></i></button>
         
        </div>
      </form>
    </div>

    
  </div>
</div>
</section>
<!-- End Newsletter Section  -->



@endsection