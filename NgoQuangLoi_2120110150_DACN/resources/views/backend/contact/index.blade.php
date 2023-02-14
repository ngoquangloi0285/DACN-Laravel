@extends('layouts.backend.index')
@section('title', 'Liên hệ khách hàng')
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
                            <h1>LIÊN HỆ KHÁCH HÀNG</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Liên hệ khách hàng</li>
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
                    <div class="card-body">
                        @includeIf('backend.mess_alert')
                        @foreach ($contact as $contact)
                            <!-- Post -->
                            <h3>User ID: #{{ $contact->user_id }}</h3>
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg"
                                        alt="user image">
                                    <span class="username">
                                        <a href="#">{{ $contact->fullname }}</a>
                                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                    </span>
                                    <span class="description">Created - {{ $contact->created_at }}</span>
                                </div>
                                <!-- /.user-block -->
                                <h5>Title: {{ $contact->title }}</h5>
                                <p>
                                    {{ $contact->content }}
                                </p>

                                <p>
                                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i>
                                        Share</a>
                                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i>
                                        Like</a>
                                    <span class="float-right">
                                        <a href="#" class="link-black text-sm">
                                            <i class="far fa-comments mr-1"></i> Comments (5)
                                        </a>
                                    </span>
                                </p>

                                <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Gửi</button>
                            </div>
                            <!-- /.post -->
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <nav aria-label="Contacts Page Navigation">
                            <ul class="pagination justify-content-center m-0">
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item"><a class="page-link" href="#">7</a></li>
                                <li class="page-item"><a class="page-link" href="#">8</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- /.card-footer -->
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
