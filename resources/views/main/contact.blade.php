@extends('main.layouts.app')
@section('content')
<div class="page-title-area bg-5">
    <div class="container">
    <div class="page-title-content">
    <h2>{{ __('navbar.contact') }}</h2>
    </div>
    </div>
    </div>
    
    <!-- ======= Contact Single ======= -->
    <section class="contact my-5 py-5">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 section-t8">
            <div class="row">
              <div class="col-md-7">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input type="text" name="name" class="form-control form-control-lg form-control-a" placeholder="{{ __('form.your_name') }}" required>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="{{ __('form.your_email') }}" required>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="text" name="subject" class="form-control form-control-lg form-control-a" placeholder="{{ __('form.subject') }}" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea name="message" class="form-control" name="message" cols="45" rows="8" placeholder="{{ __('form.message') }}" required></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 my-3">
                      <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                      </div>
                    </div>

                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-a">{{ __('form.send_message') }}</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-5 section-md-t3">
                <div class="icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="bi bi-envelope"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">{{ __('body.hello') }}</h4>
                    </div>
                    <div class="icon-box-content">
                      <p class="mb-1">{{ __('form.email') }} : 
                        <span class="color-a">acfa.studies@gmail.com</span>
                      </p>
                      <p class="mb-1">{{ __('body.int_phone') }} : 
                        <span class="color-a">+15854764909</span>
                      </p>
                      <p class="mb-1">{{ __('body.whatsapp_number') }} 
                        <span class="color-a">+15854764909</span>
                      </p>

                    </div>
                  </div>
                </div>
                <div class="icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="bi bi-geo-alt"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">{{ __('body.find_us') }}</h4>
                    </div>
                    <div class="icon-box-content">
                      <div>
                        {{ __('body.eng_lang') }} {{ __('body.address') }}
                      </div>
                      <div>
                        
                      </div>
                    </div>
                  </div>
                </div>

                <div class="icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="bi bi-credit-card-2-back"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">{{ __('body.pay') }}</h4>
                    </div>
                    <div class="icon-box-content">
                      <p class="mb-1">
                        <div class="credit-cards" style="text-align: center; width: 100%">
                          <img height="40" class="img-thumbnail" src="{{ asset('images/card_visa.png') }}"/>
                          <img height="40" class="img-thumbnail"  src="{{ asset('images/card_master.png') }}"/>
                          <img height="40" class="img-thumbnail" src="{{ asset('images/card_paypal.png') }}"/>
                          <img height="40" class="img-thumbnail" src="{{ asset('images/tether.jpeg') }}"/>
                         </div>
                      </p>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Single-->

@endsection