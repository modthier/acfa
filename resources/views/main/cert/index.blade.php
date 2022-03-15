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

        
    </div>
</div>
@endsection