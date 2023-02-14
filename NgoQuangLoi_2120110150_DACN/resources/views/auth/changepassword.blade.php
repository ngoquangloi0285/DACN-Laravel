@extends('layouts.auth.auth')
@section('title', 'Đổi mật khẩu')
@section('content')
    <div class="login-box">
        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1"><b>{{ $title }}</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
                <form action="{{ route('auth.password_action') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Old password" name="old_password"
                            value="{{ old('old_password') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('old_password'))
                        <p class="text-danger text-sm">{{ $errors->first('old_password') }}</p>
                    @endif
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="New password" name="new_password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('new_password'))
                        <p class="text-danger text-sm">{{ $errors->first('new_password') }}</p>
                    @endif
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="New password confirmation"
                            name="new_password_confirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('new_password_confirmation'))
                        <p class="text-danger text-sm">{{ $errors->first('new_password_confirmation') }}</p>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Change password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="{{ route('auth.login') }}">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

@endsection
