@extends('main.layouts.app')
@section('content')

<div class="page-title-area bg-5">  
    <div class="container">
        <div class="page-title-content">
            <h1>{{ __('body.trainers') }}</h1>
           
        </div>
    </div>
</div>

     <!-- ======= instructors  ======= -->
<div class="our-instructors-area mt-4">
<div class="container">
       <div>
        <p>
            <h3>You can trust our teachers’ experience-led expertise</h3>
        </p>
       <p>
        Our teachers are experts in the area they are teaching and feel passionate about it. 
        Our teachers understand and have experience in several activities such as sales, negotiations, 
        contracting, financials, HR, legal matters, making speeches, storytelling,
         and giving and receiving feedback. Your teacher will share their knowledge
          and expertise with you in a way that makes you truly experience the English 
          language in a contextually and culturally appropriate manner
       </p>
        
       </div>
        <div class="row justify-content-center bg-light pt-5">
                @foreach ($trainers as $trainer)
                <div class="col-xl-3 col-sm-6 rounded">
                    <div class="box single-instructors-item">
                        <a href="{{ route('main.trainer.show',$trainer->slug) }}">
                            @if($trainer->trainer_image)
                            <img src="{{ $trainer->trainer_image[0] }}"
                            alt="{{ $trainer->name }}" class="rounded">
                            @endif
                        </a>
                        <div class="instructors-content p-3">
                            <h3>
                                <a href="{{ route('main.trainer.show',$trainer->slug) }}">
                                    {{ $trainer->name }}
                                </a>
                            </h3>
                            <span>{{ implode(' | ',$trainer->trainer_cert) }}</span>
                           
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-md-12 mt-5">
                   {{ $trainers->links() }}
                </div>
        </div>
</div>
</div>

@endsection