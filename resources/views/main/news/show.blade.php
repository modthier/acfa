@extends('main.layouts.app')
@section('content')
<!-- ======= Blog details  ======= -->
<div class="blog-details-area mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-content">
                 
                    <div class="blog-top-content">
                        <div class="news-content">
                            <ul class="admin">
                                <li>
                                    <i class="bi bi-calendar2"></i>
                                    <span>{{ date_format($news->created_at,'M d,Y') }}</span>
                                </li>
                                <li>
                                    <i class="bi bi-star"></i>
                                    <span>{{ $news->views }} Views</span>
                                </li>
                            </ul>
                            <h3>{{ $news->title }}</h3>
                            {!! $news->content  !!}
                        </div>
                
                
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
            <div class="widget-sidebar">
        
                <div class="sidebar-widget recent-post">
                <h3 class="widget-title">Recent Post</h3>
                   @foreach ($recent as $item)
                       <h3>{{ $item->title }}</h3>
                   @endforeach
                </div>
        

            </div>
            </div>
        </div>
    </div>
</div>
    @endsection