@extends('layouts.backend.index')
@section('title', 'Thêm Slider')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>THÊM SLIDER</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Thêm Slider</li>
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
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @includeIf('backend.mess_alert')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="title" class="form-label">Tên Slider</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                        id="title" aria-describedby="emailHelp" placeholder="Nhập vào tên Slider">
                                    @if ($errors->has('title'))
                                        <div class="text-danger">{{ $errors->first('title') }}</div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <label for="link" class="form-label">Nhập đường dẫn</label>
                                    <input type="text" name="link" class="form-control" value="{{ old('link') }}"
                                        id="link" aria-describedby="emailHelp" placeholder="Nhập vào tên Slider">
                                    @if ($errors->has('link'))
                                        <div class="text-danger">{{ $errors->first('link') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Hình đại diện</label>
                                    <input type="file" name="image" class="form-control" value="{{ old('image') }}"
                                        id="image" aria-describedby="emailHelp" placeholder="Nhập vào tên danh mục">
                                </div>
                                
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Vị trị</label>
                                    <select class="form-control" name="sort_order" id="sort_order">
                                        <option value="0">--Vị trí sắp xếp--</option>
                                        {!! $list_html_sort_order !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Trạng thái </label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1">Hiện</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success btn-sm"><i
                                        class="fa-solid fa-floppy-disk"></i> Tạo</button>
                                <a href="{{ route('slider.index') }}" class="btn btn-sm btn-primary"><i
                                        class="fa-solid fa-arrow-rotate-left"></i>
                                    Quay lại</a>
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
    </form>
    <!-- /.content-wrapper -->
@endsection
