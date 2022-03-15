@extends('admin.layouts.app')
@section('content')
<div class="card mb-3">
    <div class="card-header position-relative min-vh-25 mb-7">
      <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url({{ asset('assets/img/background.png') }});">
      </div>
      <!--/.bg-holder-->

      <div class="avatar avatar-5xl avatar-profile">
          <img class="rounded-circle img-thumbnail shadow-sm" src="{{ $trainer->trainer_image[0] }}" width="200" alt=""></div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-8">
          <h4 class="mb-1"> {{ $trainer->translate('en')->name }}
              <span data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="Verified" aria-label="Verified"><svg class="svg-inline--fa fa-check-circle fa-w-16 text-primary" data-fa-transform="shrink-4 down-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(0.75, 0.75)  rotate(0 0 0)"><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" transform="translate(-256 -256)"></path></g></g></svg><!-- <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small> Font Awesome fontawesome.com --></span>
          </h4>
          <h5 class="fs-0 fw-normal">Email : {{ $trainer->email}}</h5>
          <h5 class="fs-0 fw-normal">Phone : {{ $trainer->phone}}</h5>
          
          <div class="border-dashed-bottom my-4 d-lg-none"></div>
        </div>
        <div class="col ps-2 ps-lg-3">
            <p>Certifications :</p>
            <p>{{ implode(' | ',$trainer->trainer_cert) }}</p>
            <button class="btn btn-falcon-default btn-sm px-3" type="button" data-bs-toggle="modal" 
            data-bs-target="#error-modal">New</button>
        </div>
       
      </div>
    </div>
</div>
<div class="row g-0">
    <div class="col-lg-8 pe-lg-2">
      <div class="card mb-3">
          <div class="card-header bg-light">
             <h3>About</h3>
          </div>
          <div class="card-body">
              {!! $trainer->translate('en')->bio !!}
          </div>
      </div>
    </div>
    <div class="col-lg-4 pe-lg-2">
        <div class="sticky-sidebar">
            <div class="card mb-3">
                <div class="card-header bg-light">
                  Work Experience
                </div>
                <div class="card-body ">
                    {!! $trainer->translate('en')->work_experience  !!}
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
    <div class="modal-content position-relative">
      <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
          <h4 class="mb-1" id="modalExampleDemoLabel">Add Certificate </h4>
        </div>
        <div class="p-4 pb-0">
          <form method="POST">
            @csrf
            <div class="mb-3">
              <label class="col-form-label" for="recipient-name">Certificate Name</label>
              <input class="form-control" name="cert" type="text" required />
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-success" value="Add">
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
@endsection