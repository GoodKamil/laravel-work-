@if(Session::has('success') || Session::has('error') )
    <div class="alert alert-{{Session::has('success') ? 'success' : 'danger'}} mb-2 text-center" role="alert">
        {{Session::has('success') ? Session::get('success') : Session::get('error') }}
    </div>
@endif
