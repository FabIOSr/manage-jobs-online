@if (session()->has('success'))
<span class="alert alert-success py-2 alert-dismissible fade show" id="alert" role="alert">
    <strong>Perfeito!</strong> <b>{{ session('success') }}!</b>
    <button type="button" class="btn-close pt-0" data-bs-dismiss="alert" aria-label="Close"></button>
</span>
@endif