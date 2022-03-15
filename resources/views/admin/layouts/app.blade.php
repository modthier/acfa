<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $metaTitle ?? config('app.name') }}</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/icons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/icons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/icons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/icons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/icons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/icons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/icons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/icons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/icons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/icons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/icons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/icons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/icons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('vendors/overlayscrollbars/OverlayScrollbars.min.js') }}"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('vendors/overlayscrollbars/OverlayScrollbars.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('assets/css/user-rtl.min.css') }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    <link href="{{ asset('css/jquery-ui.min.css') }}">
    <link href="{{ asset('css/bootstrap-tokenfield.min.css') }}">
    <style>
      .token-input {
        max-width: 100%;
      }

      .equal{
        width: 100%;
        height:100%;
        display: flex;
        justify-content: space-between;
        align-items: initial;
        flex-direction: column;
        -webkit-box-shadow: 0 0 20px 3px rgba(0, 0, 0, .05);
        box-shadow: 0 0 20px 3px rgba(0, 0, 0, .05);
      }
      iframe {
          width:100%;
      }
      @media (min-width: 992px) {
        iframe {
          width:560px;
        }
      }
    </style>

<style class="example">
  .form-section {
    padding-left: 15px;
    border-left: 2px solid #FF851B;
    display: none;
  }
  .form-section.current {
    display: inherit;
  }
  .btn-info, .btn-default {
    margin-top: 10px;
  }
      </style>

    @livewireStyles
    
    
    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>

  </head>

  <body>
    <main class="main" id="top">
      <div class="container-fluid" data-layout="container">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        @include('admin/layouts/header')
       
        <div class="content">
          @include('admin/layouts/navbar')
          @if(Session::has('message'))
            <div class="card bg-success  mb-3">
                <div class="card-body  text-white">
                   {{ session('message') }}
                </div>
            </div>
          @endif
          @if($errors->any())
          <div class="card mb-3">
              <div class="card-body">
                @foreach($errors->all() as $error)
                  <div class="alert alert-danger text-dark">
                      {{$error}}
                  </div>
               @endforeach
              </div>
              </div>
           @endif
          @yield('content')
          
          @include('admin/layouts/footer')
        </div>
       
            
             
      </div>
     
    </main>
      <!-- END: Content-->
  


      @livewireScripts
        <!-- BEGIN: Vendor JS-->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
        <script src="{{ asset('vendors/is/is.min.js') }}"></script>
        <script src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
        <script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
        
        <script src="{{ asset('assets/js/theme.js') }}"></script>
        <script src="{{ asset('js/bootstrap-tokenfield.js') }}"></script>
        <script type="text/javascript">
          $(document).ready(function(){

           $('#cert').tokenfield();
          });
        </script>
        <script src="{{ asset('assets/js/parsley.min.js') }}"></script>
         <script type="text/javascript">
          $(function () {
            var $sections = $('.form-section');
          
            function navigateTo(index) {
              // Mark the current section with the class 'current'
              $sections
                .removeClass('current')
                .eq(index)
                  .addClass('current');
              // Show only the navigation buttons that make sense for the current section:
              
              var atTheEnd = index >= $sections.length - 1;
              $('.form-navigation .next').toggle(!atTheEnd);
              $('.form-navigation [type=submit]').toggle(atTheEnd);
            }
          
            function curIndex() {
              // Return the current index by looking at which section has the class 'current'
              return $sections.index($sections.filter('.current'));
            }
          
            // Previous button is easy, just go back
            $('.form-navigation .previous').click(function() {
              navigateTo(curIndex() - 1);
            });
          
            // Next button goes forward iff current block validates
            $('.form-navigation .next').click(function() {
              $('.demo-form').parsley().whenValidate({
                group: 'block-' + curIndex()
              }).done(function() {
                navigateTo(curIndex() + 1);
              });
            });
          
            // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
            $sections.each(function(index, section) {
              $(section).find(':input').attr('data-parsley-group', 'block-' + index);
            });
            navigateTo(0); // Start at the beginning
          });
          </script>
    
      </body>
    
    </html>

   
  </body>
</html>