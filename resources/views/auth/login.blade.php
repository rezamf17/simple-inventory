@extends('layouts.app')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <b>Job</b>Applicator</a>
</div>
<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login</p>
      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="input-group mb-3"> 
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
              </div>
          </div>

      </div>

  <div class="input-group mb-3">
     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
      </div>
  </div>
</div>
</div>

<div class="float-center">
    <div class="">
        <button type="submit" class="btn btn-primary btn-block">
            {{ __('Login') }}
        </button>
    </div>
</div>
</form>

</div>
</div>
@endsection
