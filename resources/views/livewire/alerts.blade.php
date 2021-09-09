<div>
    @if ( !empty($type) && !empty($message) )
    <div class="container">
        <div class="alert alert-{{ $type }} alert-dismissible" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
</div>

