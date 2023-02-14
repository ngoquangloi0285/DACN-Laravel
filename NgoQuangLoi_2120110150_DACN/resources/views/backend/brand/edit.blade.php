@extends('layouts.backend.index')
@section('title', 'Sửa thương hiệu')
{{-- @php
    dd($list_category);
@endphp --}}
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{ route('brand.update', ['brand' => $brand->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>SỬA THƯƠNG HIỆU</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Sửa thương hiệu</li>
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
                                    <button type="submit" class="btn btn-success btn-sm"><i
                                            class="fa-solid fa-floppy-disk"></i> Sửa</button>
                                    <a href="{{ route('brand.index') }}" class="btn btn-sm btn-primary"><i
                                            class="fa-solid fa-arrow-rotate-left"></i>
                                        Quay về</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @includeIf('backend.mess_alert')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên thương hiệu</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $brand->name) }}" id="name" aria-describedby="emailHelp"
                                        placeholder="Nhập vào tên thương hiệu" style="font-weight: 500;color: blue">
                                    @if ($errors->has('name'))
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="metakey" class="form-label">Từ khóa</label>
                                    <textarea name="metakey" id="metakey" class="form-control" placeholder="Nhập vào từ khóa tìm kiếm">{{ old('metakey', $brand->metakey) }}</textarea>
                                    @if ($errors->has('metakey'))
                                        <div class="text-danger">{{ $errors->first('metakey') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="metadesc" class="form-label">Mô tả</label>
                                    <textarea name="metadesc" id="metadesc" class="form-control" placeholder="Nhập vào mô tả">{{ old('metadesc', $brand->metadesc) }}</textarea>
                                    @if ($errors->has('metadesc'))
                                        <div class="text-danger">{{ $errors->first('metadesc') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Hình đại diện</label>
                                    <input type="file" name="image" class="form-control" value="{{ old('image') }}"
                                        id="image" aria-describedby="emailHelp" placeholder="Nhập vào tên danh mục">
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="parent_id" class="form-label">Thương hiệu Cha</label>
                                    <select class="form-control" name="parent_id" id="parent_id">
                                        <option value="0">--Cấp cha--</option>
                                        {!! $list_html_parentID !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Vị trị</label>
                                    <select class="form-control" name="sort_order" id="sort_order">
                                        <option value="0">--Vị trí sắp xếp--</option>
                                        {!! $list_html_sort_order !!}
                                    </select>
                                </div> --}}
                                <div class="mb-3">
                                    <label for="status" class="form-label">Trạng thái </label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1">Hiện</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Đã cập nhật!, vào lúc <i> {{ $brand->updated_at }}</i> bởi ID
                                <i>{{ $brand->updated_by }}</i></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
