@extends('admin.layouts.app')

@section('content')

        <div class="card">
            <div class="card-header text-info">
                <h3>Add New  Country</h3>
            </div>
            
           <div class="card-body bg-light">
                <form action="{{ route('admin.country.store') }}" class="form row" method="POST">
                 @csrf
                    <div class="form-group col-lg-6">
                        <label for="name_en">Country Name English </label>
                        <input type="text" name="name_en" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="name_ar">Country Name Arabic</label>
                        <input type="text" name="name_ar" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="code">Code </label>
                        <input type="text" name="code" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="country_code">Country Code  </label>
                        <input type="text" name="country_code" class="form-control" required>
                    </div>
                    

                    <div class="form-group col-lg-12 mt-3">
                       
                        <input type="submit" value="Save" class="btn btn-success">
                    </div>
                
                </form>
           </div>
        </div>
   
@endsection