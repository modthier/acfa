@extends('admin.layouts.app')

@section('content')

        <div class="card">
          <div class="card-header">
              <h3>Update Course</h3>
          </div>
           <div class="card-body bg-light">
                <form action="{{ route('admin.course.update',$course->id) }}" class="form row"
                 method="POST" enctype="multipart/form-data">
                 @csrf
                 @method('PUT')
                    <div class="form-group col-lg-6 mt-2">
                        <label for="name_ar"> Course Name English </label>
                        <input type="text" name="name_en" class="form-control" 
                        value="{{ $course->translate('en')->name }}" required>
                    </div>

                    <div class="form-group col-lg-6 mt-2">
                        <label for="name_ar"> Course Name Arabic</label>
                        <input type="text" name="name_ar" class="form-control"
                        value="{{ $course->translate('ar')->name }}" required>
                    </div>


                    <div class="form-group col-lg-6 mt-2">
                        <label for="category_id">Course Category</label>
                        <select name="category_id" class="form-control"  required>
                            <option></option>
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}" 
                                @if($course->category_id == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                            
                        </select>
                    </div>

                    <div class="form-group col-lg-6 mt-2">
                        <label for="trainer_id">Course Trainer</label>
                        <select name="trainer_id" class="form-control"  required>
                            <option></option>
                            @foreach ($trainers as $item)
                            <option value="{{ $item->id }}" 
                                @if($course->trainer_id == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-6 mt-2">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" value="{{ $course->price }}" required>
                    </div>

                    <div class="form-group col-lg-6 mt-2">
                        <label for="hours">Total Hours</label>
                        <input type="number" name="hours" class="form-control" 
                        value="{{ $course->hours }}" required>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-2">
                        <label for="weeks">How Many Weeks ?</label>
                        <input type="number" name="weeks" class="form-control" '
                        value="{{ $course->weeks }}" required>
                    </div>

                    <div class="form-group col-lg-6 mt-2">
                        <label for="days_in_week">How Many Days in The Week</label>
                        <input type="number" name="days_in_week" class="form-control"
                         value="{{ $course->days_in_week }}" required>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-2">
                        <label for="description_en">Description Englsih  </label>
                        <textarea name="description_en" class="form-control tinymce">{{ $course->translate('en')->description }}</textarea>
                    </div>

                    <div class="form-group col-lg-6 mt-2">
                        <label for="description_ar">Description Arabic  </label>
                        <textarea name="description_ar" class="form-control tinymce">{{ $course->translate('ar')->description }}</textarea>
                    </div>

                    <div class="form-group col-lg-12 mt-2">
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