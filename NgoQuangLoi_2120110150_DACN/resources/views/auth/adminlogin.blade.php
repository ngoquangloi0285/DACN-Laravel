@extends('layouts.auth.auth')
@section('title', 'Đăng nhập Quản trị viên')
@section('content')
    <div class="login-box">
        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('auth.adminlogin') }}" class="h1"><b>{{ $title }}</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg"><strong>Sign in to start your session</strong></p>

                <form action="{{ route('auth.adminlogin_action') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="User name" name="username"
                            value="{{ old('username') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('username'))
                        <p class="text-danger text-sm">{{ $errors->first('username') }}</p>
                    @endif
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <p class="text-danger text-sm">{{ $errors->first('password') }}</p>
                    @endif
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->
                <p class="mb-1">
                  @auth
                  <a href="{{ route('auth.password') }}">I forgot my password</a>
                  @endauth
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
