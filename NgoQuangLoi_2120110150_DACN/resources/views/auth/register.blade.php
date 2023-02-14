@extends('layouts.auth.auth')

@section('content')
    <div class="login-box">
        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('auth.register') }}" class="h1"><b>{{ $title }}-</b>ALTT</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg"><strong>Sign in to start your session</strong></p>

                <form action="{{ route('auth.register_action') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name" name="fullname"
                            value="{{ old('fullname') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('fullname'))
                        <p class="text-danger text-sm">{{ $errors->first('fullname') }}</p>
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="User name" name="name"
                            value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('name'))
                        <p class="text-danger text-sm">{{ $errors->first('name') }}</p>
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email" name="email"
                            value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        <p class="text-danger text-sm">{{ $errors->first('email') }}</p>
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
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password Comfirmation" name="password_confirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <p class="text-danger text-sm">{{ $errors->first('password_confirmation') }}</p>
                    @endif
                    <div class="row">
                        <div class="col-8">
                         
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

                <p class="mb-0">
                    <a href="{{ route('auth.login') }}" class="text-center">Do you already have an account?</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
