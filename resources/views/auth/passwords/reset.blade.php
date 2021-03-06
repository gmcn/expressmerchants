@extends('layouts.login')

@section('content')
<?php
  //page title
  //$title = 'Reset <span>Password</span>';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 matchheight">
          <form method="POST" action="{{ route('password.update') }}">
              @csrf

              <input type="hidden" name="token" value="{{ $token }}">

              <div class="form-group row">

                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail address" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                  @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif

              </div>

              <div class="form-group row">

                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>

                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif

              </div>

              <div class="form-group row">

                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>

              </div>

              <div class="form-group row mb-0">
                      <button type="submit" class="btn btn-primary">
                          {{ __('Reset Password') }}
                      </button>
              </div>
          </form>
        </div>
        <div class="col-md-9 content d-none d-md-block matchheight">
          <h1>Complete your<br />
          password<br />
          <span>reset.</span></h1>

          <p>Do you want to find out more about how we can help your business through being more streamlined?</p>

          <p>Would you like to save money in time and duplication of working and join a huge network of suppliers?</p>

          <p><strong>Call us today to see how we can help your business.</strong></p>

          <a href="tel:028 3835 1388">028 3835 1388</a>

        </div>
    </div>
</div>
@endsection
