@extends('layouts.backend.404')
@section('title', 'Bạn không có quyền truy cập!')
@section('content')
<a class="btn btn-primary" href="{{ route('/') }}" role="button">Trở về</a>
@endsection