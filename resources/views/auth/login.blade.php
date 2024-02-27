@extends('layouts.loginpage')

@section('content')
   <div class="login-box">
        <div class="login-logo">
            <a
                href="../../index2.html"><b>{{ config('constants.site.name') }}</b><br />{{ config('constants.site.subTitle') }}</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form method="POST" action="{{ route('login') }}" class="text-start">
                    @csrf

                    @php
                        $invalid = $errors->has('loginusername') || $errors->has('loginpassword') || $errors->has('loginerror');
                    @endphp

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="username" name="loginusername"
                            class="form-control @if ($invalid) is-invalid @endif" id="username"
                            placeholder="Enter Username" aria-describedby="username-error" aria-invalid="true"
                            value="{{ old('loginusername') }}">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="loginpassword"
                            class="form-control @if ($invalid) is-invalid @endif" id="loginpassword"
                            placeholder="Enter Password" aria-describedby="password-error" aria-invalid="true">
                        @if ($invalid)
                            <span id="password-error" class="error invalid-feedback">Invalid Username/Password</span>
                        @endif
                    </div>



                    <span id="exampleInputPassword1-error" class="error invalid-feedback">Please provide a
                        password</span>
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



                <p class="mb-1">
                    <a href="{{ route('forgot') }}">I forgot my password</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

  <!-- jQuery -->
@endsection
