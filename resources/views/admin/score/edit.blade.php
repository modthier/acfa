@extends('admin.layouts.app')

@section('content')

        <div class="card">
            <div class="card-header text-info">
                <h3>Update Score Result</h3>
            </div>
            
           <div class="card-body bg-light">
                <form action="{{ route('admin.scoreResult.update',$score->id) }}" class="form row" method="POST">
                 @csrf
                 @method('PUT')
                    <div class="form-group col-lg-6">
                        <label for="exam_id">Exam Name</label>
                        <select name="exam_id" class="form-control">
                            <option></option>
                            @foreach ($exams as $exam)
                                <option value="{{ $exam->id }}"
                                    @if($score->exam_id == $exam->id)
                                        selected
                                    @endif
                                    >{{ $exam->translate('en')->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="user_id">Candidate Name</label>
                        <select name="user_id" class="form-control" required>
                            <option></option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" 
                                    @if ($score->user_id == $user->id) selected @endif>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group col-lg-6 mt-3">
                        <label for="candidate_number">Candidate Number</label>
                        <input name="candidate_number" class="form-control" type="number"
                        value="{{ $score->candidate_number }}" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="center_number">Center Number</label>
                        <input name="center_number" class="form-control" type="number" 
                        value="{{ $score->center_number }}"  required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="candidate_number">Test Date</label>
                        <input name="test_date" class="form-control" type="date" 
                        value="{{ $score->test_date }}" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="center_number">Overall</label>
                        <input name="overall" class="form-control" type="text" 
                        value="{{ $score->overall }}" required />
                    </div>    

                    <div class="form-group col-lg-6 mt-3">
                        <label for="listening">Listening</label>
                        <input name="listening" class="form-control" type="text" 
                        value="{{ $score->listening }}" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="reading">Reading</label>
                        <input name="reading" class="form-control" type="text" 
                        value="{{ $score->reading }}" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="writing">Writing</label>
                        <input name="writing" class="form-control" type="text" 
                        value="{{ $score->writing }}" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="speaking">Speaking</label>
                        <input name="speaking" class="form-control" type="text" 
                        value="{{ $score->speaking }}" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="speaking">Overall Band Score</label>
                        <input name="overall_band_score" class="form-control" type="text"
                        value="{{ $score->overall_band_score }}" required />
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label for="speaking">Overall Adjective</label>
                        <input name="overall_adjective" class="form-control" type="text"
                        value="{{ $score->overall_adjective }}" required />
                    </div>

                    <div class="form-group col-lg-12 mt-3">
                        <label for="comment">Overall Description</label>
                        <textarea name="overall_description" class="form-control tinymce">{{ $score->overall_description }}</textarea>
                    </div>

                    <div class="form-group col-lg-12 mt-3">
                       
                        <input type="submit" value="Update" class="btn btn-success">
                    </div>
                
                </form>
           </div>
        </div>
   
@endsection