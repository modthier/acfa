@extends('main.layouts.app-exam')
@section('content')

<div class="container">
    <!-- ======= Exam  ======= -->
    <div class="row my-5">
      <div class="col-lg-12">
        
            <div class="card">
               <div class="card-body">
                <h3>Your Score is {{ number_format($score,0) }}</h3>
                <h3>Your answers</h3>
                @foreach ($answers as $item)
                    {!! $item->examQuestion->question !!} {{ $item->choice }} 
                        @if($item->correct == 1)
                        <i class="fa fa-check-circle text-success "></i> 
                        @else 
                        <i class="fa fa-times text-danger"></i> 
                        @endif
                
                @endforeach
               </div>
            </div>
        
    </div>

    <!-- ======= End Exam  ======= -->
  </div>
</div>
@endsection