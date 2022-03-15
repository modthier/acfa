@extends('admin.layouts.app')

@section('content')

        <div class="card">
            <div class="card-header text-info">
                <h3>Add New SlideShow</h3>
            </div>
            
           <div class="card-body bg-light">
                <form action="{{ route('admin.slider.update',$slider) }}" class="form row" method="POST"
                 enctype="multipart/form-data">
                 @csrf
                 @method('PUT')
                    <div class="form-group col-lg-6">
                        <label for="title_en">Title English</label>
                        <input type="text" name="title_en" class="form-control" 
                        value="@if($slider->hasTranslation('en')){{ $slider->transalte('en')->title }}@endif">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="title_en">Title Arabic</label>
                        <input type="text" name="title_en" class="form-control"
                        value="@if($slider->hasTranslation('ar')){{ $slider->transalte('ar')->title }}@endif">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="content_en">Content Englsih  </label>
                        <textarea name="content_en" class="form-control tinymce">@if($slider->hasTranslation('en')){{ $slider->transalte('en')->content }}@endif</textarea>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="content_ar">Content Arabic  </label>
                        <textarea name="content_ar" class="form-control tinymce">@if($slider->hasTranslation('ar')){{ $slider->transalte('ar')->content }}@endif</textarea>
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="icon"> Background Image  </label>
                        <input type="file" name="image" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-12 mt-3">
                        <input type="submit" value="Save" class="btn btn-success">
                    </div>
                
                </form>
           </div>
        </div>
   
@endsection