@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row flex-between-center">
              <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                <h3 class="mb-0  py-2 py-xl-0">Exams</h3>
              </div>
              <div class="col-8 col-sm-auto text-end ps-2">
                
                <div id="table-customers-replace-element">
                 
                    <a href="{{ route('admin.exam.create') }}" class="btn btn-falcon-default btn-lg">
                       <span class="fas fa-plus" data-fa-transform="shrink-3 down-2">
                           </span><span class="d-none d-sm-inline-block ms-1">
                        New
                       </span>
                    </a>
                 
                </div>
              </div>
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table table-sm table-striped fs--1 mb-0">
                <thead class="bg-200 text-900">
                    <th class="sort pe-1 align-middle white-space-nowrap">Name</th>
                    <th class="sort pe-1 align-middle white-space-nowrap">Exam Type</th>
                    <th class="sort pe-1 align-middle white-space-nowrap">Status</th>
                    <th class="sort pe-1 align-middle white-space-nowrap">Price</th>
                    <th class="sort pe-1 align-middle white-space-nowrap"></th>
                </thead>
                <tbody>
                    @foreach ($exams as $exam)
                        
                   
                    <tr>
                        <td class="name align-middle white-space-nowrap py-2">
                            <a href="{{ route('admin.exam.show',$exam->id) }}">
                                <h5 class="mb-0 fs--1">{{ $exam->translate('en')->name }}</h5>
                          </a>
                        </td>
                        <td class="align-middle py-2">{{ $exam->exam_type }}</td>
                        <td class="align-middle py-2">
                            @if($exam->payment_status)
                              Paid
                            @else 
                              Free
                            @endif
                        </td>
                        <td class="align-middle py-2">{{ $exam->price }}$</td>
                        <td class="align-middle white-space-nowrap py-2 text-end">
                            <div class="dropdown font-sans-serif position-static">
                              <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                                  <span class="fas fa-ellipsis-h fs--1"></span></button>
                              <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-0" style="">
                                <div class="bg-white py-2">
                                    <a class="dropdown-item" href="{{ route('admin.exam.edit',$exam->id) }}">Edit</a>
                                    <a class="dropdown-item text-danger" href="" onclick="event.preventDefault();
                                    var r = confirm('Are Your Sure');
                                    if (r == true) {document.getElementById('delete_exam_{{ $exam->id }}').submit();}">Delete</a>
                                    <form id="delete_exam_{{ $exam->id }}" 
                                        action="{{ route('admin.exam.destroy',$exam->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>
                               </div>
                              </div>
                            </div>
                          </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection