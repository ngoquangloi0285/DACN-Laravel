@extends('layouts.backend.index')
@section('title', 'Sửa Menu')
{{-- @php
    dd($list_category);
@endphp --}}
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{ route('menu.update', ['menu' => $menu->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>SỬA MENU</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Sửa Menu</li>
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
                                    <a href="{{ route('menu.index') }}" class="btn btn-sm btn-primary"><i
                                            class="fa-solid fa-arrow-rotate-left"></i>
                                        Quay về</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @includeIf('backend.mess_alert')
                        <div class="row">
                            <div class="col-md-12">
                                @if ($menu->type != 'custom')
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên Menu</label>
                                        <input type="text" readonly name="name" class="form-control"
                                            value="{{ old('name', $menu->name) }}" id="name"
                                            aria-describedby="emailHelp" placeholder="Nhập vào tên Menu"
                                            style="font-weight: 500;color: blue">
                                        @if ($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control"
                                            value="{{ old('slug'), $menu->name }}" id="slug"
                                            aria-describedby="emailHelp" placeholder="Nhập vào slug menu">
                                        @if ($errors->has('slug'))
                                            <div class="text-danger">{{ $errors->first('slug') }}</div>
                                        @endif
                                    </div>
                                @else
                                    <div class="mb-3">
                                        <label for="name"class="form-label">Tên Menu</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $menu->name) }}" id="name"
                                            aria-describedby="emailHelp" placeholder="Nhập vào tên Menu"
                                            style="font-weight: 500;color: blue">
                                        @if ($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Liên kết</label>
                                        <input type="text" name="slug" class="form-control"
                                            value="{{ old('slug', $menu->slug) }}" id="slug"
                                            aria-describedby="emailHelp" placeholder="Nhập vào tên Menu">
                                        @if ($errors->has('slug'))
                                            <div class="text-danger">{{ $errors->first('slug') }}</div>
                                        @endif
                                    </div>

                                @endif
                                <div class="card">
                                    <div class="card-header" id="headingPosition">
                                        <label for="position">Vị trí</label>
                                        <select name="position" id="position" class="form-control">
                                            <option value="mainmenu">MainMenu</option>
                                            <option value="footermenu">FooterMenu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="parent_id" class="form-label">Menu cấp Cha</label>
                                    <select class="form-control" name="parent_id" id="parent_id">
                                        <option value="0">--Cấp cha--</option>
                                        {!! $list_html_parentID !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Vị trí</label>
                                    <select class="form-control" name="sort_order" id="sort_order">
                                        <option value="0">--Vị trí sắp xếp--</option>
                                        {!! $list_html_sort_order !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Trạng thái </label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" {{ $menu->status == 1 ? 'selected' : '' }}>Hiện</option>
                                        <option value="0"{{ $menu->status == 0 ? 'selected' : '' }}>Ẩn</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Đã cập nhật!, vào lúc <i> {{ $menu->updated_at }}</i> bởi ID
                                <i>{{ $menu->updated_by }}</i></strong>
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
