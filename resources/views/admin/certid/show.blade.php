@extends('admin.layouts.app')
@section('content')

<div class="card mb-3">
    <div class="card-header">
        Student Certificate Details
    </div>
    <div class="card-body bg-light">
       <table class="table">
            <thead>
                <th>Certificate Name</th>
                <th>Certificate Number</th>
                <th>Student Name</th>
                <th>Issue Date</th>
            </thead>
            <tr>
                <td>{{ $certificateId->certificate_name}}</td>
                <td>{{ $certificateId->certificate_id }}</td>
                <td>{{ $certificateId->user->name }}</td>
                <td>{{ $certificateId->issue_date }}</td>
            </tr>
       </table>
     </div>
</div>
<div class="card">
    <div class="card-body">
        <img src="{{ $certificateId->cert_image[0] }}" style="width: 100%;" alt="">
    </div>
</div>
@endsection