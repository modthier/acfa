@extends('admin.layouts.app')

@section('content')

        <div class="card">
            <div class="card-header text-info">
                <h3>Add New Course Category</h3>
            </div>
            
           <div class="card-body bg-light">
                <form action="{{ route('admin.category.store') }}" class="form row" method="POST"
                 enctype="multipart/form-data">
                 @csrf
                    <div class="form-group col-lg-6">
                        <label for="name_en">Course Category English </label>
                        <input type="text" name="name_en" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="name_ar">Course Category Arabic</label>
                        <input type="text" name="name_ar" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="description_en">Description Englsih  </label>
                        <textarea name="description_en" class="form-control tinymce"></textarea>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="description_en">Description Arabic  </label>
                        <textarea name="description_ar" class="form-control tinymce"></textarea>
                    </div>

                    <div class="form-group col-lg-12">
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