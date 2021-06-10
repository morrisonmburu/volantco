@extends('layouts.app')

@section('content')


<!-- Content area -->
<div class="content d-flex justify-content-center align-items-center">
    <!-- Login card -->
    <form class="login-form" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1" style="color: #8F0236;"></i>
                    <h5 class="mb-0">Login to your account</h5>
                    <span class="d-block text-muted">Your credentials</span>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required="required">
                    @error('email')
                    <span class="invalid-feedback" style="color: red;" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  <div class="form-control-feedback">
                    <i class="icon-user text-muted"></i>
                </div>
            </div>

            <div class="form-group form-group-feedback form-group-feedback-left">
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

        <div class="form-group d-flex align-items-center">
            <div class="form-check mb-0">
                <label class="form-check-label">
                    <input type="checkbox" name="remember" class="form-input-styled" checked data-fouc>
                    Remember
                </label>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" style="background-color: #8F0236; color: #ffffff;"> Login <i class="icon-circle-right2 ml-2"></i></button>
        </div>

    </div>
</div>
</form>
<!-- /login card -->

</div>
<!-- /content area -->

<!-- /form with validation -->
@endsection
