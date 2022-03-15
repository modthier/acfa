@extends('admin.layouts.app')

@section('content')

        <div class="card">
          <div class="card-header">
              <h3>Add New Course</h3>
          </div>
           <div class="card-body bg-light">
                <form action="{{ route('admin.course.store') }}" class="form row"
                 method="POST" enctype="multipart/form-data">
                 @csrf
                    <div class="form-group col-lg-6 mt-2">
                        <label for="name_ar"> Course Name English </label>
                        <input type="text" name="name_en" class="form-control" 
                        value="{{ old('name_en') }}" required>
                    </div>

                    <div class="form-group col-lg-6 mt-2">
                        <label for="name_ar"> Course Name Arabic</label>
                        <input type="text" name="name_ar" class="form-control" 
                        value="{{ old('name_ar') }}"  required>
                    </div>


                    <div class="form-group col-lg-6 mt-2">
                        <label for="category_id">Course Category</label>
                        <select name="category_id" class="form-control"  required>
                            <option></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->translate('en')->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-6 mt-2">
                        <label for="trainer_id">Course Trainer</label>
                        <select name="trainer_id" class="form-control"  required>
                            <option></option>
                            @foreach ($trainers as $trainer)
                                <option value="{{ $trainer->id }}">{{ $trainer->translate('en')->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-6 mt-2">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" 
                        value="{{ old('price') }}" required>
                    </div>

                    <div class="form-group col-lg-6 mt-2">
                        <label for="hours">Total Hours</label>
                        <input type="number" name="hours" class="form-control"
                        value="{{ old('hours') }}" required>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-2">
                        <label for="weeks">How Many Weeks ?</label>
                        <input type="number" name="weeks" class="form-control"
                        value="{{ old('weeks') }}" required>
                    </div>

                    <div class="form-group col-lg-6 mt-2">
                        <label for="days_in_week">How Many Days in The Week</label>
                        <input type="number" name="days_in_week" class="form-control"
                        value="{{ old('days_in_week') }}" required>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-2">
                        <label for="description_en">Description Englsih  </label>
                        <textarea name="description_en" class="form-control tinymce">{{ old('description_en') }}</textarea>
                    </div>

                    <div class="form-group col-lg-6 mt-2">
                        <label for="description_en">Description Arabic  </label>
                        <textarea name="description_ar" class="form-control tinymce">{{ old('description_ar') }}</textarea>
                    </div>

                    <div class="form-group col-lg-12 mt-2">
                        <label for="icon"> Icon  </label>
                        <input type="file" name="icon" class="form-control">
                    </div>

                    <div class="form-group col-lg-12 mt-3">
                       
                        <input type="submit" value="Save" class="btn btn-success">
                    </div>
                
                </form>
           </div>
        </div>
   
@endsection