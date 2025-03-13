@if(Session::has('success'))
    <p class="alert text-center alert-success">
        {{Session::get('success')}}
    </p>
@endif

@if(Session::has('error'))
    <p class="alert text-center alert-danger">
        {{Session::get('error')}}
    </p>
@endif

@if(Session::has('warning'))
    <p class="alert text-center alert-warning">
        {{Session::get('warning')}}
    </p>
@endif

@if(Session::has('info'))
    <p class="alert text-center alert-info">
        {{Session::get('info')}}
    </p>
@endif