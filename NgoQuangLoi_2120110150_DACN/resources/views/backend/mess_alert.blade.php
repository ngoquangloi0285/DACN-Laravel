@php
    $arr = session()
@endphp
@if (session('message'))
@php
    $arr = session('message');
@endphp
    <div class="alert alert-{{ $arr['type'] }} alert-dismissible fade show" role="alert">
        <strong>Thông báo! </strong> <i>{{ $arr['msg'] }}, vào lúc {{ $arr['created_at'] }}</i>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
