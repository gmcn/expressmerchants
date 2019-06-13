@extends('layouts.app')

@section('content')

<div class="container">
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/company-create') }}">
  {!! csrf_field() !!}
    <div class="form-group{{ $errors->has('companyName') ? ' has-error' : '' }}">
      <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Company Name" value="" required>

      @if ($errors->has('companyName'))
      <span class="help-block">
        <strong>{{ $errors->first('companyName') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">
      <input type="text" class="form-control" id="companyPhone" name="companyPhone" placeholder="Company Phone" value="" required>

      @if ($errors->has('companyPhone'))
      <span class="help-block">
        <strong>{{ $errors->first('companyPhone') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">

      <input class="form-control" id="companyFax" name="companyFax" value="" placeholder="Company Fax">

      @if ($errors->has('companyFax'))
      <span class="help-block">
        <strong>{{ $errors->first('companyFax') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">

      <input class="form-control" id="companyContact" name="companyContact" value="" placeholder="Company Contact" required>

      @if ($errors->has('companyContact'))
      <span class="help-block">
        <strong>{{ $errors->first('companyContact') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">

      <input class="form-control" id="companyContactEmail" name="companyContactEmail" placeholder="Company Contact Email" value="" placeholder="companyContactEmail" required>

      @if ($errors->has('companyContactEmail'))
      <span class="help-block">
        <strong>{{ $errors->first('companyContactEmail') }}</strong>
      </span>
      @endif
    </div>


    <div class="form-group">

      <input class="form-control" id="companyAddress" name="companyAddress" value="" placeholder="Company Address" required>

      @if ($errors->has('companyAddress'))
      <span class="help-block">
        <strong>{{ $errors->first('companyAddress') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group custom-search-form">
      <button type="submit" class="btn btn-default red">Submit </button>
    </div>

  </form>
</div>



@endsection
