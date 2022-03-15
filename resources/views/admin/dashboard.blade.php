@extends('admin.layouts.app')
@section('content')

        <div class="card">
            <div class="bg-holder d-none d-lg-block bg-card"
             style="background-image:url({{ asset('assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
            <div class="card-body">
                @if($admins)
                    @foreach ($admins as $admin)
                        @if($admin->isLoggedIn())
                            <li>{{ $admin->name }}</li>
                        @endif
                    @endforeach
            @endif
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6 col-xxl-3">
                  <div class="card h-md-100 ecommerce-card-min-width">
                    <div class="card-header pb-0">
                      <h4 class="mb-0 mt-2 d-flex align-items-center">Trainers  </h4>
                    </div>
                    <div class="card-body">
                      
                    
                    </div>
                  </div>
            </div>
        </div>
   
    
@endsection