@extends('layouts.backend.index')
@section('title', 'Chi tiết sự kiện')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    @method('PUT')
    @csrf
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>CHI TIẾT SỰ KIỆN</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Chi tiết sự kiện</li>
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

                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('post.index') }}" class="btn btn-sm btn-primary"><i
                                        class="fa-solid fa-arrow-rotate-left"></i>
                                    Quay về</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @includeIf('backend.mess_alert')
                    <div class="container">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-success">
                                    <th>Mã</th>
                                    <th>Mã chủ đề</th>
                                    <th>Tiêu đề</th>
                                    <th>Slug</th>
                                    <th>Hình ảnh</th>
                                    <th>Tìm kiếm</th>
                                    <th>Mô tả</th>
                                    <th>Ngày sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-warning">
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->topic_id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->slug }}</td>
                                    {{-- <td>{{ $post->image }} --}}
                                    <td><img class="img-fluid" src="{{ asset('images/post/' . $post->image) }}"
                                            alt="{{ $post->image }}"></td>
                                    </td>
                                    <td>
                                        {{ $post->metakey }}
                                    </td>
                                    <td>
                                        {{ $post->metadesc }}
                                    </td>
                                    <td>{{ $post->updated_at }}</td>

                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </section>
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
@endsection
