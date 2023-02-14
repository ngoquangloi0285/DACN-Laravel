@extends('layouts.backend.index')
@section('title', 'Chi tiết chủ đề')
{{-- @php
    dd($list_category);
@endphp --}}
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
                        <h1>CHI TIẾT CHỦ ĐỀ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Chi tiết chủ đề</li>
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
                                <a href="{{ route('brand.index') }}" class="btn btn-sm btn-primary"><i
                                        class="fa-solid fa-arrow-rotate-left"></i>
                                    Quay về</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @includeIf('backend.mess_alert')
                    <div class="container">
                        @php
                            $detail = $brand;
                            // print_r($detail);
                        @endphp
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-warning">
                                    <th>Mã</th>
                                    <th>Tên danh mục</th>
                                    <th>Slug</th>
                                    <th>Hình ảnh</th>
                                    <th>Vị trí</th>
                                    <th>Tìm kiếm</th>
                                    <th>Mô tả</th>
                                    <th>Ngày sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-primary">
                                    <td>{{ $detail->id }}</td>
                                    <td>{{ $detail->name }}</td>
                                    <td>{{ $detail->slug }}</td>
                                    {{-- <td>{{ $detail->image }} --}}
                                    <td><img src="https://th.bing.com/th/id/OIP._eorMkta58cV6elGI4N6BgHaEo?pid=ImgDet&rs=1"
                                            style="width: 6rem" alt="..."></td>
                                    </td>
                                    <td>{{ $detail->sort_order }}</td>
                                    <td>
                                        <textarea name="metadesc" id="metadesc" class="form-control" placeholder="{{ $detail->metakey }}" disabled>{{ old('metadesc') }}</textarea>
                                    </td>
                                    <td>
                                        <textarea name="metadesc" id="metadesc" class="form-control" placeholder="{{ $detail->metadesc }}" disabled>{{ old('metadesc') }}</textarea>
                                    </td>
                                    <td>{{ $detail->updated_at }}</td>

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
