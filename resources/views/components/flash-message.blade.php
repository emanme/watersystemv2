@if (session()->has('message'))
 
    <div class="alert alert-success alert-dismissible  m-3">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Saved!</h5>
        {{ session('message') }}
        </div>
@endif
