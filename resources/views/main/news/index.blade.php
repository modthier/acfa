@extends('main.layouts.app')
@section('content')

<div class="page-title-area bg-5">
    <div class="container">
        <div class="page-title-content">
            <h2>{{ __('navbar.news') }}</h2>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h2>{{ __('body.checkout') }}</h2>
</div>
<div class="container mt-5">
    <div class="row">

        @foreach($news as $item)
       
            <div class="news-item">
                <div class="news-img">
                    <img src="{{ $item->news_image[0] }}" alt="{{ $item->title }}">
                </div>
                <div class="news-body">
                    <h3><a href="{{ route('main.news.show',$item->slug) }}">{{ $item->title }}</a></h3>
                    {!! $item->summary  !!}
                </div>
            </div>
        
          
        
        @endforeach
    </div>
</div>

@endsection