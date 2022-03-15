@extends('admin.layouts.app')
@section('content')
        
<div class="card">
    <div class="card-header text-info">
        <h3>Update Trainer</h3>
    </div>
    
    <div class="card-body bg-light">
        <form action="{{ route('admin.trainer.update',$trainer->id) }}" class="form row" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group col-lg-6 mt-2">
                <label for="name_en">Name in English </label>
                <input type="text" name="name_en" class="form-control" 
                value="{{ $trainer->translate('en')->name }}" required>
            </div>

            <div class="form-group col-lg-6 mt-2">
                <label for="name_ar">Name in Arabic</label>
                <input type="text" name="name_ar" class="form-control" 
                value="{{ $trainer->translate('ar')->name }}" required>
            </div>

            <div class="form-group col-lg-6 mt-2">
                <label for="phone">Phone Number </label>
                <input type="text" name="phone" class="form-control" value="{{ $trainer->phone }}" required>
            </div>

            <div class="form-group col-lg-6 mt-2">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $trainer->email }}" required>
            </div>

            <div class="form-group col-lg-6 mt-2">
                <label for="bio_en">Bio Englsih  </label>
                <textarea name="bio_en" class="form-control tinymce">{{ $trainer->translate('en')->bio }}</textarea>
            </div>

            <div class="form-group col-lg-6 mt-2">
                <label for="bio_ar">Bio Arabic  </label>
                <textarea name="bio_ar" class="form-control tinymce">{{ $trainer->translate('en')->bio }}</textarea>
            </div>

            <div class="form-group col-lg-6 mt-2">
                <label for="bio_en">Work experience Englsih  </label>
                <textarea name="work_experience_en" class="form-control tinymce">{{ $trainer->translate('en')->bio }}</textarea>
            </div>

            <div class="form-group col-lg-6 mt-2">
                <label for="bio_ar">Work experience for trainer Arabic  </label>
                <textarea name="work_experience_ar" class="form-control tinymce">{{ $trainer->translate('en')->bio }}</textarea>
            </div>

            <div class="form-group col-lg-12 mt-2">
                <label for="image"> Image  </label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group col-lg-12 mt-3">
                
                <input type="submit" value="Update" class="btn btn-success">
            </div>
        
        </form>
    </div>
</div>

@endsection