@extends('admin.layouts.app')

@section('content')

        <div class="card">
            <div class="card-header text-info">
                <h3>Update Course Category</h3>
            </div>
            
           <div class="card-body bg-light">
                <form action="{{ route('admin.category.update',$category->id) }}" class="form row" method="POST"
                 enctype="multipart/form-data">
                 @csrf
                 @method('PUT')
                    <div class="form-group col-lg-6">
                        <label for="name_en">Course Category English </label>
                        <input type="text" name="name_en" class="form-control" 
                        value="{{ $category->translate('en')->name }}" required>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="name_ar">Course Category Arabic</label>
                        <input type="text" name="name_ar" class="form-control" 
                         value="{{ $category->translate('ar')->name }}" required>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="description_en">Description Englsih  </label>
                        <textarea name="description_en" class="form-control tinymce">{{ $category->translate('en')->description }}</textarea>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="description_en">Description Arabic  </label>
                        <textarea name="description_ar" class="form-control tinymce">{{ $category->translate('ar')->description }}</textarea>
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