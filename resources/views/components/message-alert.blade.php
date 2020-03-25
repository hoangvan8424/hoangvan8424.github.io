<div class="container" style="position: relative; margin-top: 20px; margin-bottom: 20px;">
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(session()->has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">
                    <i class="fas fa-check-circle"></i>
                    <span class="font-weight-bold">{{ session()->get('alert-' . $msg) }}</span>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </p>
            @endif
        @endforeach
    </div>
</div>


