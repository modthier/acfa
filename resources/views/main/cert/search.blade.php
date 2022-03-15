@extends('main.layouts.app')
@section('content')
<div class="page-title-area bg-5">
    <div class="container">
        <div class="page-title-content">
            <h2>{{ __('navbar.cert') }}</h2>
        </div>
    </div>
</div>
<!-- ======= Registration  ======= -->
<div class="container">
    <div class="my-5">

        <div class="row">
            <div class="s01 mb-5">
            <form action="{{ route('main.cert.search') }}" method="get">
                    
                <fieldset>
                    <legend>{{ __('content.cert_number') }}</legend>
                </fieldset>
                <div class="inner-form">
                  <div class="input-field first-wrap">
                    <input id="search" type="search" name="cert_id" />
                  </div>
                  <div class="input-field third-wrap">
                    <button class="btn-search" type="submit">{{ __('body.search') }}</button>
                  </div>
                </div>
              </form>
            </div>
        </div>

        @if($result->count() > 0)
        <div class="row">
            <div class="col-lg-6">
                <!-- Light Mode -->
                <div class="card cardBorderCorners lightCard">
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <h3 class="lightDesc card-text"><span class="fw-bold">{{ __('body.student_name') }} : {{ $result->first()->user->name }}</span></h3>
                                <p>{{ __('body.issue_date') }} : {{ $result->first()->issue_date }}</p>
                                <p>{{ __('body.cert_name') }} : {{ $result->first()->certificate_name }}</p>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div style="">
                <img class="img-flxuid" src="{{ $result->first()->cert_image[0] }}" style="max-height: 387px;" alt="{{ $result->first()->certificate_name }}">
                
                    <a href="{{ route('main.cert.download',$result->first()->id) }}" class="btn btn-a d-block mt-3">{{ __('body.download') }}</a>
                </div>
            </div>
        </div>
        @else 
        <div class="row">
            <h3 class="text-center text-danger">{{ __('content.no_result') }}</h3>
        </div>
        @endif
    </div>
</div>
@endsection