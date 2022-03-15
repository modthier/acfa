@extends('admin.layouts.app')
@section('content')
<div class="card mb-3">
    <div class="card-body">
        {{ $news->translate('en')->title }}
    </div>
</div>
<div class="row g-0 mb-3">
    <div class="col-lg-6 pe-lg-2">
      <div class="card mb-3 equal">
        <div class="card-header bg-light">
            News Image
          </div>
          <div class="card-body">
              <img src="{{ $news->news_image[0] }}" width="100%">
          </div>
      </div>
    </div>
    <div class="col-lg-6 pe-lg-2">
        
            <div class="card mb-3 equal">
                <div class="card-header bg-light">
                  Summary
                </div>
                <div class="card-body">
                    {!! $news->translate('en')->summary  !!}
                </div>
            </div>
        
    </div>
</div>

<div class="row g-0">
    <div class="col-lg-12 pe-lg-2">
      <div class="card mb-3">
        <div class="card-header bg-light">
            Full News
          </div>
          <div class="card-body">
             {!! $news->translate('en')->content !!}
          </div>
      </div>
    </div>
</div>



@endsection