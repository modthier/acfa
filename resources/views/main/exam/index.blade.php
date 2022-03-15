@extends('main.layouts.app')
@section('content')

<div class="page-title-area bg-5">
    <div class="container">
        <div class="page-title-content">
           <h1>{{ __('navbar.exams') }}</h1>
        </div>
    </div>
</div>

<div class="our-instructors-area mt-4">
    <div class="container">
           
            <div class="row justify-content-center bg-light pt-5">
                    @foreach ($exams as $exam)
                    <div class="col-xl-3 col-sm-6 rounded">
                        <div class="box single-instructors-item">
                           
                                @if($exam->exam_icon)
                                <img src="{{ $exam->exam_icon[0] }}"
                                alt="{{ $exam->name }}" class="rounded">
                                @endif
                            
                            <div class="instructors-content p-3">
                                <h3 class="text-center mb-3">
                                    
                                    {{ $exam->name }}
                                    
                                </h3>
                                @if($exam->exam_type == 'website')
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('main.exam.show',$exam->id) }}" target="__blanck" class="btn btn-success btn-lg">
                                            Tack The Test Now
                                        </a>
                                    </div>
                                    
                                @endif
                               
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12 mt-5">
                       {{ $exams->links() }}
                    </div>
            </div>
    </div>
    </div>

@endsection