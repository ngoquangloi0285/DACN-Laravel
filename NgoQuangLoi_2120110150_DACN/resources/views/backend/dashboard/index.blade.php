@extends('layouts.backend.index')
@section('title','Home Admin')
@section('content')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Blank Page</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Blank Page</li>
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
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <nav class="navbar navbar-expand-lg bg-light">
                                <div class="container-fluid">
                                  
                                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                      <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{ route('/') }}">Home</a>
                                      </li>
                                      <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Dropdown
                                        </a>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="#">Action</a></li>
                                          <li><a class="dropdown-item" href="#">Another action</a></li>
                                          <li><hr class="dropdown-divider"></li>
                                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                      </li>
                                      <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Dropdown
                                        </a>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="#">Action</a></li>
                                          <li><a class="dropdown-item" href="#">Another action</a></li>
                                          <li><hr class="dropdown-divider"></li>
                                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                      </li>
                                      <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Dropdown
                                        </a>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="#">Action</a></li>
                                          <li><a class="dropdown-item" href="#">Another action</a></li>
                                          <li><hr class="dropdown-divider"></li>
                                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                      </li>
                                      <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Dropdown
                                        </a>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="#">Action</a></li>
                                          <li><a class="dropdown-item" href="#">Another action</a></li>
                                          <li><hr class="dropdown-divider"></li>
                                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                    <form class="d-flex" role="search">
                                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                      <button class="btn btn-outline-success" type="submit">Search</button>
                                    </form>
                                  </div>
                                </div>
                              </nav>
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