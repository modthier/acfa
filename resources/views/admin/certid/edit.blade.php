@extends('admin.layouts.app')

@section('content')

        <div class="card">
            <div class="card-header text-info">
                <h3>Update Student Certificate</h3>
            </div>
            
           <div class="card-body bg-light">
                <form action="{{ route('admin.certificateId.update',$certId->id) }}" class="form row" method="POST"
                 enctype="multipart/form-data">
                 @csrf
                 @method('PUT')
                    <div class="form-group col-lg-6">
                        <label for="certificate_name">Certificate Name</label>
                        <input type="text" name="certificate_name" class="form-control" 
                        value="{{ $certId->certificate_name }}" required>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="certificate_id">Certificate Number</label>
                        <input type="text" name="certificate_id" class="form-control"
                        value="{{ $certId->certificate_id }}"  required>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="user_id">  Student Name </label>
                        <select name="user_id" class="form-control" required>
                            <option></option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" 
                                    @if ($certId->user_id == $user->id) selected @endif>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="description_en">  Issue Date </label>
                        <input type="date" name="issue_date" class="form-control"
                        value="{{ $certId->issue_date }}"  required>
                    </div>


                    <div class="form-group col-lg-12">
                        <label for="image"> Certificate  </label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group col-lg-12 mt-3">
                        <input type="submit" value="Update" class="btn btn-success">
                    </div>
                
                </form>
           </div>
        </div>
   
@endsection