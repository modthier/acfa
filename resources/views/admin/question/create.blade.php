@extends('admin.layouts.app')

@section('content')

        <div class="card">
            <div class="card-header text-info">
                <h3>Add New Exam Question</h3>
            </div>
            
           <div class="card-body bg-light">
                <form action="{{ route('admin.question.store') }}" class="form row" method="POST">
                 @csrf
                    <div class="form-group col-lg-12">
                        <label for="exam_id">Exam Name</label>
                        <select name="exam_id" class="form-control">
                            <option></option>
                            @foreach ($exams as $exam)
                                <option value="{{ $exam->id }}">{{ $exam->translate('en')->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-12 mt-3">
                        <label for="question">Question</label>
                        <textarea name="question" class="form-control tinymce"></textarea>
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="choice-1">Choice 1</label>
                        <input name="choice-1" class="form-control" type="text" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="choice-1-select">Correct Answer</label>
                        <select name="choice-1-select" class="form-control" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="choice-2">Choice 2</label>
                        <input name="choice-2" class="form-control" type="text" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="choice-2-select">Correct Answer</label>
                        <select name="choice-2-select" class="form-control" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="choice-3">Choice 3</label>
                        <input name="choice-3" class="form-control" type="text" required/>
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="choice-3-select">Correct Answer</label>
                        <select name="choice-3-select" class="form-control" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="choice-4">Choice 4</label>
                        <input name="choice-4" class="form-control" type="text" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="choice-4-select">Correct Answer</label>
                        <select name="choice-4-select" class="form-control" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-12 mt-3">
                       
                        <input type="submit" value="Save" class="btn btn-success">
                    </div>
                
                </form>
           </div>
        </div>
   
@endsection