@extends('admin.layouts.app')

@section('content')

        <div class="card">
            <div class="card-header text-info">
                <h3>Add Score Result</h3>
            </div>
            
           <div class="card-body bg-light">
                <form action="{{ route('admin.scoreResult.store') }}" class="form row" method="POST">
                 @csrf
                    <div class="form-group col-lg-6">
                        <label for="exam_id">Exam Name</label>
                        <select name="exam_id" class="form-control">
                            <option></option>
                            @foreach ($exams as $exam)
                                <option value="{{ $exam->id }}">{{ $exam->translate('en')->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group col-lg-6">
                        <label for="user_id">Candidate Name</label>
                        <select name="user_id" class="form-control" required>
                            <option></option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="candidate_number">Candidate Number</label>
                        <input name="candidate_number" class="form-control" type="number" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="center_number">Center Number</label>
                        <input name="center_number" class="form-control" type="number" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="candidate_number">Test Date</label>
                        <input name="test_date" class="form-control" type="date" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="center_number">Overall</label>
                        <input name="overall" class="form-control" type="text" required />
                    </div>    

                    <div class="form-group col-lg-6 mt-3">
                        <label for="listening">Listening</label>
                        <input name="listening" class="form-control" type="text" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="reading">Reading</label>
                        <input name="reading" class="form-control" type="text" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="writing">Writing</label>
                        <input name="writing" class="form-control" type="text" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="speaking">Speaking</label>
                        <input name="speaking" class="form-control" type="text" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="speaking">Overall Band Score</label>
                        <input name="overall_band_score" class="form-control" type="text" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="speaking">Overall Adjective</label>
                        <input name="overall_adjective" class="form-control" type="text" required />
                    </div>

                    <div class="form-group col-lg-12 mt-3">
                        <label for="comment">Overall Description</label>
                        <textarea name="overall_description" class="form-control tinymce"></textarea>
                    </div>

        

                    <div class="form-group col-lg-12 mt-3">
                       
                        <input type="submit" value="Save" class="btn btn-success">
                    </div>
                
                </form>
           </div>
        </div>
   
@endsection