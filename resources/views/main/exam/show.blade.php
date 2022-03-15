@extends('main.layouts.app-exam')
@section('content')
<div class="page-title-area bg-5">
    <div class="container">
      <div class="page-title-content">
        <h2> Test your knowledge</h2>
        <h3>{{ $exam->translate('en')->name }}</h3>
      </div>
    </div>
  </div>


  <div class="container">
    <!-- ======= Exam  ======= -->
    <div class="row my-5">
      <div class="col-lg-12">
        
            
            <form action="{{ route('store.exam.result') }}" method="POST" class="demo-form">
                @csrf
                <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                @foreach ($exam->questions as $question)
                <div class="form-section">
                    <h3>{!! $question->question !!}</h3>
                    @foreach ($question->question_answers as $item)
                   
                      <div class="pretty p-default p-round p-bigger">
                        <input type="radio" value="{{ $item->id }}" name="qn-{{ $question->id }}" id="qn-{{ $question->id }}"  />
                        <div class="state p-warning-o">
                            <label>{{ $item->choice }}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
              
                <div class="form-navigation">
                  <button type="button" class="next btn btn-info btn-lg">Next &gt;</button>
                  <input type="submit" class="btn btn-primary btn-lg">
                  <span class="clearfix"></span>
                </div>
              
              </form>    
        
      
    </div>

    <!-- ======= End Exam  ======= -->
  </div>
  </div>
  @endsection