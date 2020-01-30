@extends('layouts.app')

@section('content')
<?php
  //page title
  $title = 'Edit <span>User</span>';
?>

<div class="container-fluid user">
    <div class="row">
      <div class="col-md-5 col-lg-3 contactdetails">
        <img class="add" src="{{ asset('/images/add-icon.svg') }}" alt="">

        <h3>Company</h3>
        <p class="company">{{ $company->companyName }}</p>
        <h3>Operator</h3>
        <p>{{ Auth::user()->name }}</p>

        <h3>Date</h3>
        <p><?php echo date('d.m.y') ?></p>

      </div>
      <div class="col-md-7 col-lg-9 form">
        @if (Auth::check())

        @if (Auth::user()->accessLevel == 1 || Auth::user()->accessLevel == 2)

        <div class="row">

          <div class="col-md-8 form_wrapper">
            <form method="post" action="{{ url('/users/') }}/{{ $user->id }}" autocomplete="off">
                {{ csrf_field() }}

                <div class="form-group row">
                  <div class="offset-md-3 col-md-8">

                    <label for="name" class="col-form-label">{{ __('Name') }}</label>

                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" id="name" value="{{ $user->name }}" />
                    @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>


                <div class="form-group row">
                  <div class="offset-md-3 col-md-8">

                    <label for="name" class="col-form-label">{{ __('Email') }}</label>

                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" id="email" value="{{ $user->email }}" />
                    @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <div class="offset-md-3 col-md-8">

                    <label for="phone" class="col-form-label">{{ __('Phone') }}</label>


                    <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ $user->phone }}" />
                    @if ($errors->has('phone'))
                    <span class="help-block">
                      <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <div class="offset-md-3 col-md-8">

                    <label for="password" class="col-form-label">{{ __('Password') }}</label>


                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" id="password" name="password" />

                    @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <div class="offset-md-3 col-md-8">

                    <label for="password_confirmation" class="col-form-label">{{ __('Password Confirmation') }}</label>


                    <input class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" type="password" id="password_confirmation" name="password_confirmation" />

                    @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <input class="d-none" type="text" id="companyId" name="companyId" value="{{ $user->companyId }}" />

                <input class="d-none" type="text" id="accessLevel" name="accessLevel" value="{{ $user->accessLevel }}" />

                <input class="d-none" type="text" id="disabled" name="disabled" value="{{ $user->disabled }}"  />

                <div class="form-group row">
                  <div class="offset-md-3 col-md-8">

                    <button class="btn btn-primary" type="submit">Send</button>

                  </div>
                </div>
            </form>
          </div>

          <div class="col-md-3 form_wrapper_details">

            @if (session('message'))
              <div class="flash-message">
                USER <br />
                SUCCESSFULLY<br />
                UPDATED.
                <a href="{{ url('/merchant-list/') }}"> < Back to Merchant List</a>
              </div>
            @endif

          </div>

        </div>

          @else

          You have no business being here

          @endif

          @endif
      </div>
    </div>
</div>






@endsection
