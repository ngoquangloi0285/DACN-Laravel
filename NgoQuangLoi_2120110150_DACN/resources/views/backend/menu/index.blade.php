@extends('layouts.backend.index')
@section('title', 'Quản lý Menu')
{{-- @php
    dd($list_category);
@endphp --}}
@section('content')
    <form action="{{ route('menu.store') }}" method="post">
        @csrf
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>QUẢN LÝ MENU</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Quản lý Menu</li>
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
                                    <a href="{{ route('menu.create') }}" class="btn btn-warning btn-sm"><i
                                            class="fa-solid fa-plus"></i> Tạo mới</a>
                                    <a href="{{ route('menu.menu_trash') }}" style="text-decoration: none"
                                        class="btn-trash btn-sm">
                                        <button type="button" class="btn btn-primary btn-sm"> <i
                                                class="fa-solid fa-trash"></i>
                                            Thùng rác <span class="badge text-bg-secondary">
                                                <strong style="font-size: 1rem;">
                                                    {!! $count !!}
                                                </strong>
                                            </span>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @includeIf('backend.mess_alert')
                        <div class="row">
                            <div class="col-md-3">
                                {{-- accordion start --}}
                                <div class="accordion" id="accordionExample">
                                    {{-- card position --}}
                                    <div class="card">
                                        <div class="card-header" id="headingPosition">
                                            <label for="position">Vị trí</label>
                                            <select name="position" id="position" class="form-control">
                                                <option value="mainmenu">MainMenu</option>
                                                <option value="footermenu">FooterMenu</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- card category --}}
                                    <div class="card">
                                        <div class="card-header" id="headingCategory">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseCategory"
                                                    aria-expanded="false" aria-controls="collapseCategory">
                                                    Danh mục
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                @foreach ($category as $category)
                                                    <div class="form-check">
                                                        <input name="checkIdCategory[]" class="form-check-input"
                                                            type="checkbox" value="{{ $category->id }}"
                                                            id="checkCategory{{ $category->id }}">
                                                        <label class="form-check-label"
                                                            for="checkCategory{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                                <div class="mb-3">
                                                    <input name="ADDCATEGORY" type="submit"
                                                        class="form-control btn btn-success" value="Thêm" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- card brand --}}
                                    <div class="card">
                                        <div class="card-header" id="headingBrand">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseBrand"
                                                    aria-expanded="false" aria-controls="collapseBrand">
                                                    Thương hiệu
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseBrand" class="collapse" aria-labelledby="headingBrand"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                @foreach ($brand as $brand)
                                                    <div class="form-check">
                                                        <input name="checkIdBrand[]" class="form-check-input"
                                                            type="checkbox" value="{{ $brand->id }}"
                                                            id="checkBrand{{ $brand->id }}">
                                                        <label class="form-check-label"
                                                            for="checkBrand{{ $brand->id }}">
                                                            {{ $brand->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                                <div class="mb-3">
                                                    <input name="ADDRAND" type="submit"
                                                        class="form-control btn btn-success" value="Thêm" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- card topic --}}
                                    <div class="card">
                                        <div class="card-header" id="headingTopic">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseTopic"
                                                    aria-expanded="false" aria-controls="collapseTopic">
                                                    Chủ đề bài viết
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseTopic" class="collapse" aria-labelledby="headingTopic"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                @foreach ($topic as $topic)
                                                    <div class="form-check">
                                                        <input name="checkIdTopic[]" class="form-check-input"
                                                            type="checkbox" value="{{ $topic->id }}"
                                                            id="checkTopic{{ $topic->id }}">
                                                        <label class="form-check-label"
                                                            for="checkTopic{{ $topic->id }}">
                                                            {{ $topic->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                                <div class="mb-3">
                                                    <input name="ADDTOPIC" type="submit"
                                                        class="form-control btn btn-success" value="Thêm" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- card page --}}
                                    <div class="card">
                                        <div class="card-header" id="headingPage">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapsePage"
                                                    aria-expanded="false" aria-controls="collapsePage">
                                                    Trang bài viết
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapsePage" class="collapse" aria-labelledby="headingPage"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                @foreach ($post as $post)
                                                    <div class="form-check">
                                                        <input name="checkIdPost[]" class="form-check-input"
                                                            type="checkbox" value="{{ $post->id }}"
                                                            id="checkPost{{ $post->id }}">
                                                        <label class="form-check-label"
                                                            for="checkPost{{ $post->id }}">
                                                            {{ $post->title }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                                <div class="mb-3">
                                                    <input name="ADDPOST" type="submit"
                                                        class="form-control btn btn-success" value="Thêm" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- card custom --}}
                                    <div class="card">
                                        <div class="card-header" id="headingCustom">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseCustom"
                                                    aria-expanded="false" aria-controls="collapseCustom">
                                                    Liên kết
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseCustom" class="collapse" aria-labelledby="headingCustom"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Nhập tên Menu">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" name="link" class="form-control"
                                                        placeholder="#Link">
                                                </div>
                                                <div class="mb-3">
                                                    <input name="ADDCUSTOM" type="submit"
                                                        class="form-control btn btn-success" value="Thêm" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- accordion end --}}
                            </div>
                            <div class="col-md-9">
                                <table class="table table-bordered" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkbox" onClick="toggle(this)"><label
                                                    for="checkbox">Check All</label></th>
                                            <th>Tên Menu</th>
                                            <th>Liên Kết</th>
                                            <th>Vị trí</th>
                                            <th>Chức năng</th>
                                            <th>Mã</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($menu as $menu)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="checkbox">
                                                </td>
                                                <td>{{ $menu->name }}</td>
                                                <td>{{ $menu->slug }}</td>
                                                <td>{{ $menu->position }}</td>
                                                <td>
                                                    @if ($menu->status == 1)
                                                        <a href="{{ route('menu.status', ['menu' => $menu->id]) }}"
                                                            class="btn btn-sm btn-primary"><i
                                                                class="fa-solid fa-toggle-on"></i>
                                                            Hiện</a>
                                                    @else
                                                        <a href="{{ route('menu.status', ['menu' => $menu->id]) }}"
                                                            class="btn btn-sm btn-danger"><i
                                                                class="fa-solid fa-toggle-off"></i>
                                                            Ẩn</a>
                                                    @endif
                                                    <a href="{{ route('menu.edit', ['menu' => $menu->id]) }}"
                                                        class="btn btn-sm btn-warning"><i
                                                            class="fa-solid  fa-pen-to-square"></i>
                                                        Chỉnh sửa</a>
                                                    <a href="{{ route('menu.show', ['menu' => $menu->id]) }}"
                                                        class="btn btn-sm btn-success"><i class="fa-solid  fa-eye"></i>
                                                        Chi tiết</a>
                                                    <a href="{{ route('menu.delete', ['menu' => $menu->id]) }}"
                                                        class="btn btn-sm btn-danger"><i
                                                            class="fa-solid  fa-trash-can"></i> Xóa</a>
                                                </td>
                                                <td>{{ $menu->id }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- /.card-footer -->
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
