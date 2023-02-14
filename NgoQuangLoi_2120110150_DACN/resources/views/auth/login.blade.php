@extends('layouts.auth.auth')

@section('content')
    <div class="login-box">
        @if (session('danger'))
            <p class="alert alert-danger">{{ session('danger') }}</p>
        @endif
        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('auth.login') }}" class="h1"><b>{{ $title }}-</b>ALTT</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg"><strong>Sign in to start your session</strong></p>

                <form action="{{ route('auth.login_action') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="User name or Email" name="username"
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
                <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="{{ route('auth.forgot_form') }}">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('auth.register') }}" class="text-center">Register a new account</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
