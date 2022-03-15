@extends('admin.layouts.app')
@section('content')

    

    <div class="card">
        <div class="card-header">
            Count Of questions {{ $exam->questions()->count() }}
        </div>
        <div class="card-body">
            <form action="{{ route('store.exam.result') }}" method="POST" class="demo-form">
                @csrf
                <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                @foreach ($exam->questions as $question)
                <div class="form-section">
                    <h3>{!! $question->question !!}</h3>
                    @foreach ($question->question_answers as $item)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="{{ $item->id }}"
                        name="qn-{{ $question->id }}" id="qn-{{ $question->id }}">
                        <label class="form-check-label" for="qn-{{ $question->id }}">
                          {{ $item->choice }}
                        </label>
                      </div>
                    @endforeach
                </div>
                @endforeach
              
                <div class="form-navigation">
                  <button type="button" class="next btn btn-info pull-right btn-lg">Next &gt;</button>
                  <input type="submit" class="btn btn-primary btn-lg pull-right">
                  <span class="clearfix"></span>
                </div>
              
              </form>
            
           
           
        </div>
    </div>
    

@endsection
