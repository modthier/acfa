<nav class="navbar navbar-default navbar-trans navbar-expand-lg">
  <div class="container-fluid">
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <a class="navbar-brand text-brand mt-2" href="index.html">
        <img class="img-fluid logo" src="{{ asset('images/android-icon-72x72.png') }}" alt="">
    </a>

    <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link active" href="{{LaravelLocalization::localizeUrl(route('home')) }}">{{ __('navbar.home') }}</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="{{ LaravelLocalization::localizeUrl(route('about')) }}">{{ __('navbar.about') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ LaravelLocalization::localizeUrl(route('main.news.index')) }}">{{ __('navbar.news') }}</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('navbar.courses') }}</a>
          <div class="dropdown-menu">
            @foreach (\App\Models\Category::all() as $category)
               <a class="dropdown-item " href="{{ LaravelLocalization::localizeUrl(route('main.category.show',$category->slug)) }}">
                {{ $category->name }}
              </a>
            @endforeach
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ LaravelLocalization::localizeUrl(route('main.trainer.index')) }}">{{ __('navbar.trainers') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('main.exam.index') }}">{{ __('navbar.exams') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('main.cert.index') }}">{{ __('navbar.cert') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{LaravelLocalization::localizeUrl(route('contact')) }}">{{ __('navbar.contact') }}</a>
        </li>
        <li class="nav-item">
          
         
        </li>
      </ul>
      <div class="login-area">
        @if(app()->getLocale() == 'ar')

        <a  hreflang="en"  href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
          <i class="bi bi-globe"></i>
            English
        </a>
        @else
        <a  hreflang="ar"  href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
          <i class="bi bi-globe"></i>
            عربي
        </a>
        @endif
        
        @if(Auth::guest())
        <a href="{{ route('login') }}">
            {{ __('navbar.login') }} 
        </a>
        <a href="" class="btn btn-sm" style="background-color: #ffc919;">{{ __('navbar.register') }}</a>
        <a href="tel:+44 1273 977 702" class="mobile-phone-button">Phone</a>
        @else        
        <div class="dropdown">
          <a class="nav-link pe-0" id="navbarDropdownUser"
           href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="avatar avatar-xl">
              <img class="rounded-circle" width="40px;" height="40px;" src="{{ asset('assets/img/team/3-thumb.png') }}" alt="" />
  
            </div>
          </a>
          <div class="dropdown-menu py-0" aria-labelledby="navbarDropdownUser">
            <div class="bg-white dark__bg-1000 rounded-2 py-2">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                this.closest('form').submit();">
                   Logout
                </a>
            </form>    
              
            </div>
          </div>
        </div>
        
        @endif
      </div>
    </div>

      
     
   
    
  </div>
</nav>