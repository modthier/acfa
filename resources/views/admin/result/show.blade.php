@extends('admin.layouts.app')
@section('content')

    <div class="card">
        <div class="card-body">
            <h3>Your Score is {{ number_format($score,0) }}</h3>
            <h3>Your answers</h3>
            @foreach ($answers as $item)
                {!! $item->examQuestion->question !!} {{ $item->choice }} 
                     @if($item->correct == 1)
                     <i class="far fa-check-circle text-success "></i> 
                     @else 
                     <i class="fas fa-times text-danger"></i> 
                     @endif
            
            @endforeach
        </div>
    </div>

@endsection