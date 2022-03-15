<div>
    <div class="card mb-3">
        <div class="card-body">
            <select wire:model="exam" class="form-control">
                <option></option>
                @foreach ($exams as $exam)
                    <option value="{{ $exam->id }}">{{ $exam->translate('en')->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row flex-between-center">
              <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                <h3 class="mb-0  py-2 py-xl-0">List Of Question</h3>
              </div>
              <div class="col-8 col-sm-auto text-end ps-2">
                
                <div id="table-customers-replace-element">
                 
                    <a href="{{ route('admin.question.create') }}" class="btn btn-falcon-default btn-lg">
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
            <table class="table table-sm table-striped table-responsive fs--1 mb-0  ">
                <thead class="bg-200 text-900">
                    <th class="sort pe-1 align-middle white-space-nowrap">Question</th>
                    <th class="sort pe-1 align-middle white-space-nowrap">Exam Name</th>
                    <th class="sort pe-1 align-middle white-space-nowrap"></th>
                </thead>
                <tbody>
                    
                    @if($questions->count() > 0)
                    @foreach ($questions as $question)
                        
                   
                    <tr>
                        <td class="align-middle py-2">
                           
                                <span class="mb-0 fs-1">{!! $question->question !!}</span>
                          
                        </td>
                        <td class="align-middle py-2">
                            <h5>{{ $question->name }}</h5>
                        </td>
                        <td class="align-middle white-space-nowrap py-2">
                            <div class="dropdown font-sans-serif position-static">
                              <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-0" 
                              data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                                  <span class="fas fa-ellipsis-h fs-2"></span></button>
                              <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-0" style="">
                                <div class="bg-white py-2">
                                    <a class="dropdown-item" href="{{ route('admin.question.edit',$question->id) }}">Edit</a>
                                    <a class="dropdown-item text-danger" href="" onclick="event.preventDefault();
                                    var r = confirm('Are Your Sure');
                                    if (r == true) {document.getElementById('delete_question_{{ $question->id }}').submit();}">Delete</a>
                                    <form id="delete_question_{{ $question->id }}" 
                                        action="{{ route('admin.exam.destroy',$question->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>
                               </div>
                              </div>
                            </div>
                          </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $questions->links() }}
        </div>
    </div>
</div>
