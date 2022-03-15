@if(session('success'))
<div class="alert alert-success border-0 alert-dismissible mb-2" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h3>{{ session('success') }}</h3>
</div>
@endif
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger border-0 alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h3>{{$error}}</h3>
        </div>
    @endforeach
@endif