@extends('admin.layouts.app')

@section('content')

        <div class="card">
            <div class="card-header text-info">
                <h3>Update Exam</h3>
            </div>
            
           <div class="card-body bg-light">
                <form action="{{ route('admin.exam.update',$exam->id) }}" class="form row" method="POST"
                 enctype="multipart/form-data">
                 @csrf
                 @method('PUT')
                    <div class="form-group col-lg-6">
                        <label for="name_en">Name English </label>
                        <input type="text" name="name_en" class="form-control"
                        value="{{ $exam->translate('en')->name }}" required>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="name_ar">Name Arabic</label>
                        <input type="text" name="name_ar" class="form-control"
                        value="{{ $exam->translate('ar')->name }}" required>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="exam_type">Exam Type</label>
                        <select name="exam_type" class="form-control">
                            <option value="website" @if($exam->exam_type == 'website') selected @endif>Website Exam</option>
                            <option value="practice" @if($exam->exam_type == 'practice') selected @endif>Practice Live</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="payment_status">Is The Exam Free </label>
                        <select name="payment_status" class="form-control">
                            <option value="0" @if($exam->payment_status == 0) selected @endif>Free</option>
                            <option value="1" @if($exam->payment_status == 1) selected @endif>Paid</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control"
                          value="{{ $exam->price }}" required>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="description_en">Description Englsih  </label>
                        <textarea name="description_en" class="form-control tinymce">{{ $exam->translate('en')->description }}</textarea>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="description_ar">Description Arabic  </label>
                        <textarea name="description_ar" class="form-control tinymce">{{ $exam->translate('ar')->description }}</textarea>
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="icon"> Icon  </label>
                        <input type="file" name="icon" class="form-control">
                    </div>

                    <div class="form-group col-lg-12 mt-3">
                       
                        <input type="submit" value="Update" class="btn btn-success">
                    </div>
                
                </form>
           </div>
        </div>
   
@endsection