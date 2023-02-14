@extends('layouts.backend.index')
@section('title', 'Quản lý người dùng')
{{-- @php
    dd($list_category);
@endphp --}}
@section('content')
    <form action="" method="post" enctype="multipart/form-data">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>QUẢN LÝ NGƯỜI DÙNG</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Quản lý người dùng</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <div class="container text-center">
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="fa-solid fa-trash-can"></i> Xóa tất cả</button>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{ route('auth.register') }}" class="btn btn-warning btn-sm"><i
                                            class="fa-solid fa-plus"></i> Đăng ký thành viên mới</a>
                                    <a href="" style="text-decoration: none" class="btn-trash btn-sm">
                                        <button type="button" class="btn btn-primary btn-sm"> <i
                                                class="fa-solid fa-trash"></i>
                                            Thùng rác <span class="badge text-bg-secondary">
                                                <strong style="font-size: 1rem;">0</strong>
                                            </span>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-solid">
                        <div class="card-body pb-0">
                    @includeIf('backend.mess_alert')
                            <div class="row">
                                @foreach ($user as $user)
                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                        <div class="card bg-light d-flex flex-fill">
                                            <div class="card-header text-muted border-bottom-0">
                                                <strong>Tên đăng nhập: {{ $user->username }}</strong>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="lead"><b>{{ $user->fullname }}</b></h2>
                                                        <p class="text-muted text-sm"><b>About: </b> updating... </p>
                                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                                            <li class="small"><span class="fa-li"><i
                                                                        class="fas fa-lg fa-building"></i></span> Address:
                                                                {{ $user->address }}</li>
                                                            <li class="small"><span class="fa-li"><i
                                                                        class="fas fa-lg fa-phone"></i></span> Phone #: +84 {{ $user->phone }}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-5 text-center">
                                                        <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar"
                                                            class="img-circle img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                @if ($user->status == 1)
                                                <a href="{{ route('user.status', ['user' => $user->user_id]) }}"
                                                    class="btn btn-sm btn-primary"><i class="fa-solid fa-toggle-on"></i>
                                                    Hiện</a>
                                            @else
                                                <a href="{{ route('user.status', ['user' => $user->user_id]) }}"
                                                    class="btn btn-sm btn-danger"><i class="fa-solid fa-toggle-off"></i>
                                                    Ẩn</a>
                                            @endif
                                            <a href="{{ route('user.edit', ['user' => $user->user_id]) }}"
                                                class="btn btn-sm btn-warning"><i class="fa-solid  fa-pen-to-square"></i>
                                                Chỉnh sửa</a>
                                            <a href="{{ route('user.show', ['user' => $user->user_id]) }}"
                                                class="btn btn-sm btn-success"><i class="fa-solid  fa-eye"></i> Chi tiết</a>
                                            <a href="{{ route('user.delete', ['user' => $user->user_id]) }}"
                                                class="btn btn-sm btn-danger"><i class="fa-solid  fa-trash-can"></i> Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card-footer -->
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        </section>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </form>
@endsection
