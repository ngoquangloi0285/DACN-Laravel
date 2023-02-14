@extends('layouts.backend.index')
@section('title', 'Sửa thông báo sự kiện')
{{-- @php
    dd($list_category);
@endphp --}}
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{ route('post.update', ['post' => $post->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>SỬA THÔNG BÁO SỰ KIỆN</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Sửa thông báo sự kiện</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="container-fluid">

                    @includeIf('backend.mess_alert')
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Thông báo sự kiện</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Tiêu đề</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Nhập vào tiêu đề" value="{{ old('title', $post->title) }}"
                                            style="font-weight: 500;color: blue">
                                        @if ($errors->has('title'))
                                            <div class="text-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="detail">Nội dung</label>
                                        <textarea name="detail" id="detail" class="form-control" rows="1" placeholder="Nhập vào nội dung">{{ old('detail', $post->detail) }}</textarea>
                                        @if ($errors->has('detail'))
                                            <div class="text-danger">{{ $errors->first('detail') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="metakey">Từ khóa</label>
                                        <textarea name="metakey" id="metakey" class="form-control" rows="1" placeholder="Nhập vào từ khóa">{{ old('metakey', $post->metakey) }}</textarea>
                                        @if ($errors->has('metakey'))
                                            <div class="text-danger">{{ $errors->first('metakey') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="metadesc">Mô tả</label>
                                        <textarea name="metadesc" id="metadesc" class="form-control" rows="1" placeholder="Nhập vào mô tả">{{ old('metadesc', $post->metadesc) }}</textarea>
                                        @if ($errors->has('metadesc'))
                                            <div class="text-danger">{{ $errors->first('metadesc') }}</div>
                                        @endif
                                    </div>
                                    <!-- select -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.row -->
                        <div class="col-md-6">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Thông báo sự kiện</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Hình đại diện</label>
                                            <input type="file" name="image" class="form-control" value="{{ old('image') }}"
                                                id="image" aria-describedby="emailHelp" placeholder="Nhập vào tên danh mục">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="topic_id">Select</label>
                                        <select class="form-control" name="topic_id" id="topic_id">
                                            <option value="0">--Chủ đề--</option>
                                            {!! $list_html_topic !!}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="form-label">Trạng thái </label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1">Show</option>
                                            <option value="0">Hide</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 text-left">
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button type="submit" class="btn btn-success btn-sm"><i
                                                        class="fa-solid fa-floppy-disk"></i>
                                                    Sửa</button>
                                                <a href="{{ route('post.index') }}" class="btn btn-sm btn-primary"><i
                                                        class="fa-solid fa-arrow-rotate-left"></i>
                                                    Quay về</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
