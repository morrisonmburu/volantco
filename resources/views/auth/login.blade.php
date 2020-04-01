@extends('layouts.app')

@section('content')
<!-- Form with validation -->
<form action="{{ route('login') }}" method="POST" class="form-validate">
  @csrf
    <div class="panel panel-body login-form">
        <div class="text-center">
            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
            <h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
        </div>

        <div class="form-group has-feedback has-feedback-left">
            <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required="required" >
            @error('email')
              <span class="invalid-feedback" style="color: red;" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>

        <div class="form-group has-feedback has-feedback-left">
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required="required">
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-control-feedback">
                <i class="icon-lock2 text-muted"></i>
            </div>
        </div>

        <div class="form-group login-options">
            <div class="row">
                <div class="col-sm-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" class="styled" checked="checked">
                        Remember
                    </label>
                </div>

                <div class="col-sm-6 text-right">
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
        </div>

        <div class="content-divider text-muted form-group"><span>Don't have an account?</span></div>
        <a href="/register" class="btn btn-default btn-block content-group">Sign up</a>
        <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
    </div>
</form>
<!-- /form with validation -->
@endsection
