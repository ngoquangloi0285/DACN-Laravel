@extends('layouts.auth.auth')
@section('title', 'Quên mật khẩu')
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
                <form action="{{ route('auth.forgot_action') }}" wire:submit.prevent="forgot_action()" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input wire:model='email' type="email" class="form-control" placeholder="Enter your email"
                            name="email" value="{{ old('email') }}" wire:model='email'>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        <p class="text-danger text-sm">{{ $errors->first('email') }}</p>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Send me reset password link</button>
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
