<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h2 class="modal-title">@yield('title')</h2>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">Close</span>
        </button>
</div>
<div class="modal-body">

@yield('content')

</div>
<div class="modal-footer">
    @yield('footer')
</div>
</div>
</div>
</div>
