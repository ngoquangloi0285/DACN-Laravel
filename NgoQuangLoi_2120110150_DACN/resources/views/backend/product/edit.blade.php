@extends('layouts.backend.index')
@section('title', 'Sửa sản phẩm')
{{-- @php
    dd($list_category);
@endphp --}}
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{ route('product.update', ['product' => $product_st->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>SỬA SẢN PHẨM</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Sửa sản phẩm</li>
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
                                    <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary"><i
                                            class="fa-solid fa-arrow-rotate-left"></i>
                                        Quay lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @includeIf('backend.mess_alert')
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="productinfo-tab" data-toggle="tab"
                                    data-target="#productinfo" type="button" role="tab" aria-controls="productinfo"
                                    aria-selected="true">Sản phẩm</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="productimage-tab" data-toggle="tab" data-target="#productimage"
                                    type="button" role="tab" aria-controls="productimage" aria-selected="false">Hình
                                    ảnh</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="productattribute-tab" data-toggle="tab"
                                    data-target="#productattribute" type="button" role="tab"
                                    aria-controls="productattribute" aria-selected="false">Thuộc tính</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="productsale-tab" data-toggle="tab" data-target="#productsale"
                                    type="button" role="tab" aria-controls="productsale" aria-selected="false">Khuyến
                                    mãi</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="productstore-tab" data-toggle="tab" data-target="#productstore"
                                    type="button" role="tab" aria-controls="productstore" aria-selected="false">Nhập
                                    sản phẩm</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active border-right border-bottom border-left p-3"
                                id="productinfo" role="tabpanel" aria-labelledby="productinfo-tab">
                                {{-- @includeIf('backend.product.tab_edit.tab_productinfo')    --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Tên sản phẩm</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name')}}" id="name"
                                                aria-describedby="emailHelp" placeholder="Nhập vào tên sản phẩm">
                                            @if ($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="detail" class="form-label">Thông tin sản phẩm</label>
                                            <textarea name="detail" id="detail" class="form-control" placeholder="Nhập thông tin sản phẩm">{{ old('detail') }}</textarea>
                                            @if ($errors->has('detail'))
                                                <div class="text-danger">{{ $errors->first('detail') }}</div>
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label for="metakey" class="form-label">Từ khóa</label>
                                            <textarea name="metakey" id="metakey" class="form-control" placeholder="Nhập vào từ khóa tìm kiếm">{{ old('metakey') }}</textarea>
                                            @if ($errors->has('metakey'))
                                                <div class="text-danger">{{ $errors->first('metakey') }}</div>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="metadesc" class="form-label">Mô tả</label>
                                            <textarea name="metadesc" id="metadesc" class="form-control" placeholder="Nhập vào mô tả">{{ old('metadesc') }}</textarea>
                                            @if ($errors->has('metadesc'))
                                                <div class="text-danger">{{ $errors->first('metadesc') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="brand_id" class="form-label">Thương hiệu</label>
                                            <select class="form-control" name="brand_id" id="brand_id">
                                                <option value="">Thương hiệu</option>
                                                {!! $list_html_Brand !!}
                                            </select>
                                            @if ($errors->has('brand_id'))
                                                <div class="text-danger">{{ $errors->first('brand_id') }}</div>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">Danh mục</label>
                                            <select class="form-control" name="category_id" id="category_id">
                                                <option value="">Danh mục sản phẩm</option>
                                                {!! $list_html_Category !!}
                                            </select>
                                            @if ($errors->has('category_id'))
                                                <div class="text-danger">{{ $errors->first('category_id') }}</div>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="price_buy" class="form-label">Giá bán</label>
                                            <input type="number" name="price_buy" class="form-control"
                                                value="{{ old('price_buy') }}" id="namecategory"
                                                aria-describedby="emailHelp" placeholder="Nhập giá bán">
                                            @if ($errors->has('price_buy'))
                                                <div class="text-danger">{{ $errors->first('price_buy') }}</div>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Trạng thái </label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="1">Hiện</option>
                                                <option value="0">Ẩn</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border-right border-bottom border-left p-3" id="productimage"
                                role="tabpanel" aria-labelledby="productimage-tab">
                                {{-- @includeIf('backend.product.tab_edit.tab_productimage')     --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Hình sản phẩm</label>
                                            <input type="file" name="image[]" multiple class="form-control"
                                                value="{{ old('image') }}" id="image" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border-right border-bottom border-left p-3" id="productattribute"
                                role="tabpanel" aria-labelledby="productattribute-tab">
                                {{-- @includeIf('backend.product.tab_edit.tab_productattribute')     --}}
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="nameattribute" class="form-label">Tên thuộc tính</label>
                                            <input type="text" name="nameattribute" class="form-control"
                                                value="{{ old('nameattribute') }}" id="nameattribute"
                                                aria-describedby="emailHelp" placeholder="Nhập vào tên sản phẩm">
                                            @if ($errors->has('nameattribute'))
                                                <div class="text-danger">{{ $errors->first('nameattribute') }}</div>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="des" class="form-label">Mô tả</label>
                                            <textarea name="des" id="des" class="form-control" placeholder="Nhập thông tin sản phẩm">{{ old('des') }}</textarea>
                                            @if ($errors->has('des'))
                                                <div class="text-danger">{{ $errors->first('des') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="attribute" class="form-label">Giá trị</label>
                                            <input type="text" name="attribute" class="form-control"
                                                value="{{ old('attribute') }}" id="attribute"
                                                aria-describedby="emailHelp" placeholder="Nhập vào tên sản phẩm">
                                            @if ($errors->has('attribute'))
                                                <div class="text-danger">{{ $errors->first('attribute') }}</div>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="sort" class="form-label">Thứ tự</label>
                                            <textarea name="sort" id="sort" class="form-control" placeholder="Nhập thông tin sản phẩm">{{ old('sort') }}</textarea>
                                            @if ($errors->has('sort'))
                                                <div class="text-danger">{{ $errors->first('sort') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border-right border-bottom border-left p-3" id="productsale"
                                role="tabpanel" aria-labelledby="productsale-tab">
                                {{-- @includeIf('backend.product.tab_edit.tab_productsale')     --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price_sale" class="form-label">Giá khuyến mãi</label>
                                            <input type="number" name="price_sale" class="form-control"
                                                value="{{ old('price_sale') }}" id="price_sale"
                                                aria-describedby="emailHelp" placeholder="Nhập giá khuyến mãi">
                                            @if ($errors->has('price_sale'))
                                                <div class="text-danger">{{ $errors->first('price_sale') }}</div>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="date_begin" class="form-label">Ngày bắt đầu</label>
                                            <input type="date" name="date_begin" class="form-control"
                                                value="{{ old('date_begin') }}" id="date_begin"
                                                aria-describedby="emailHelp" placeholder="Nhập ngày bắt đầu">
                                            @if ($errors->has('date_begin'))
                                                <div class="text-danger">{{ $errors->first('date_begin') }}</div>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="date_end" class="form-label">Ngày kết thúc</label>
                                            <input type="date" name="date_end" class="form-control"
                                                value="{{ old('date_end') }}" id="namecategory"
                                                aria-describedby="emailHelp" placeholder="Nhập ngày kết thúc">
                                            @if ($errors->has('date_end'))
                                                <div class="text-danger">{{ $errors->first('date_end') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border-right border-bottom border-left p-3" id="productstore"
                                role="tabpanel" aria-labelledby="productstore-tab">
                                {{-- @includeIf('backend.product.tab_edit.tab_productstore')     --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Giá nhập</label>
                                            <input type="number" name="price" class="form-control"
                                                value="{{ old('price') }}" id="price" aria-describedby="emailHelp"
                                                placeholder="Nhập giá sản phẩm">
                                            @if ($errors->has('price'))
                                                <div class="text-danger">{{ $errors->first('price') }}</div>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="qty" class="form-label">Số lượng</label>
                                            <input type="number" name="qty" id="qty" class="form-control"
                                                placeholder="Nhập số lượng">{{ old('qty') }}</input>
                                            @if ($errors->has('qty'))
                                                <div class="text-danger">{{ $errors->first('qty') }}</div>
                                            @endif
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
    </form>
    <!-- /.content-wrapper -->
@endsection
