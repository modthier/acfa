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
          <a href="" class="nav-link">
            <svg fill="#FF0000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="40px" height="40px"><path d="M 8.03125 8.4570312 C 7.770375 8.4589063 7.5103125 8.5625312 7.3203125 8.7695312 C 3.3953125 13.041531 1 18.741 1 25 C 1 31.259 3.3953125 36.958469 7.3203125 41.230469 C 7.7003125 41.644469 8.3569063 41.643094 8.7539062 41.246094 L 10.882812 39.117188 C 11.265812 38.734187 11.263391 38.124656 10.900391 37.722656 C 7.8553906 34.352656 6 29.889 6 25 C 6 20.111 7.8553906 15.647344 10.900391 12.277344 C 11.263391 11.875344 11.265813 11.266812 10.882812 10.882812 L 8.7539062 8.7539062 C 8.5554063 8.5554063 8.292125 8.4551562 8.03125 8.4570312 z M 41.96875 8.4570312 C 41.707625 8.4554062 41.444594 8.5554062 41.246094 8.7539062 L 39.115234 10.884766 C 38.732234 11.267766 38.734656 11.875344 39.097656 12.277344 C 42.143656 15.646344 44 20.111 44 25 C 44 29.889 42.144609 34.352656 39.099609 37.722656 C 38.736609 38.124656 38.734188 38.733187 39.117188 39.117188 L 41.246094 41.246094 C 41.643094 41.643094 42.299687 41.643469 42.679688 41.230469 C 46.604687 36.958469 49 31.259 49 25 C 49 18.741 46.604687 13.041531 42.679688 8.7695312 C 42.489688 8.5625312 42.229875 8.4586563 41.96875 8.4570312 z M 35.625 14.837891 C 35.355125 14.824516 35.079594 14.920406 34.871094 15.128906 L 32.740234 17.259766 C 32.381234 17.618766 32.341969 18.196938 32.667969 18.585938 C 34.123969 20.323937 35 22.561 35 25 C 35 27.439 34.123969 29.675109 32.667969 31.412109 C 32.341969 31.801109 32.381234 32.379281 32.740234 32.738281 L 34.871094 34.871094 C 35.288094 35.288094 35.967516 35.250687 36.353516 34.804688 C 38.625516 32.175687 40 28.748 40 25 C 40 21.252 38.625516 17.824312 36.353516 15.195312 C 36.160516 14.972313 35.894875 14.851266 35.625 14.837891 z M 14.375 14.839844 C 14.105125 14.853219 13.839484 14.974266 13.646484 15.197266 C 11.374484 17.825266 10 21.252 10 25 C 10 28.748 11.374484 32.175688 13.646484 34.804688 C 14.032484 35.250687 14.711906 35.288094 15.128906 34.871094 L 17.259766 32.740234 C 17.618766 32.381234 17.658031 31.803062 17.332031 31.414062 C 15.876031 29.676062 15 27.439 15 25 C 15 22.561 15.876031 20.324891 17.332031 18.587891 C 17.658031 18.198891 17.618766 17.620719 17.259766 17.261719 L 15.128906 15.128906 C 14.920406 14.920406 14.644875 14.826469 14.375 14.839844 z M 25 19 C 21.686 19 19 21.686 19 25 C 19 28.314 21.686 31 25 31 C 28.314 31 31 28.314 31 25 C 31 21.686 28.314 19 25 19 z"/></svg>
        </a>
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