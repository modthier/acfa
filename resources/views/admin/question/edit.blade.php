@extends('admin.layouts.app')

@section('content')

        <div class="card">
            <div class="card-header text-info">
                <h3>Update Exam Question</h3>
            </div>
            
           <div class="card-body bg-light">
                <form action="{{ route('admin.question.update',$question->id) }}" class="form row" method="POST">
                 @csrf
                 @method('PUT')
                    <div class="form-group col-lg-12">
                        <label for="exam_id">Exam Name</label>
                        <select name="exam_id" class="form-control">
                            <option></option>
                            @foreach ($exams as $exam)
                                <option value="{{ $exam->id }}"
                                    @if($question->exam_id == $exam->id)
                                        selected
                                    @endif
                                    >{{ $exam->translate('en')->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-12 mt-3">
                        <label for="question">Question</label>
                        <textarea name="question" class="form-control tinymce">{{ $question->question }}</textarea>
                    </div>

                    @foreach ($question->examQuestionAnswers as $item)
                        
                   
                    <div class="form-group col-lg-6 mt-3">
                        <label for="choice-{{ $loop->index+1 }}">Choice {{ $loop->index+1 }}</label>
                        <input name="choice-{{ $loop->index+1 }}" class="form-control" type="text"
                        value="{{ $item->choice }}" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="choice-{{ $loop->index+1 }}-select">Correct Answer</label>
                        <select name="choice-{{ $loop->index+1 }}-select" class="form-control" required>
                            <option value="0" @if($item->correct == 0) selected @endif>No</option>
                            <option value="1" @if($item->correct == 1) selected @endif>Yes</option>
                        </select>
                    </div>
                    @endforeach

                   
                    <div class="form-group col-lg-12 mt-3">
                       
                        <input type="submit" value="Update" class="btn btn-success">
                    </div>
                
                </form>
           </div>
        </div>
   
@endsection