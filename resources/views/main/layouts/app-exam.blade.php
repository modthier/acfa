<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

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
    <link href="{{ asset('main/css/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('main/css/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('main/css/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('main/css/odometer.min.css') }}">
    <link href="{{ asset('main/css/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css">
    <!-- Main CSS Files -->
    <link rel="stylesheet" href="{{ asset('main/css/style.css') }}">
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css
    ">
    <style>
      .dropdown-item {
        text-align: initial;
      }
      .row{
        --bs-gutter-x: 1rem;
      }
      .pretty {
        font-size: 2em;
        display: block;
        margin-bottom: 1em;
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
 <body>
   


        
        @yield('content')
        
    



    @livewireScripts
    
    <script src="{{ asset('main/css/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('main/css/vendor/swiper/swiper-bundle.min.js') }}"></script>
 
    <!-- Template Main JS File -->
   
    <script src="{{ asset('main/js/main.js') }}"></script>
    </script>
    <script src="{{ asset('main/js/jquery.min.js') }}"></script>
    <script src="{{ asset('main/js/odometer.min.js') }}"></script>
    
    <script>
        $(".odometer").html(function (e) {
            var odo = $(".odometer");
            odo.each(function () {
              var countNumber = $(this).attr("data-count");
              $(this).html(countNumber);
            });
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