@extends('layouts.app')

@section('content')

<div class="container">
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/merchant-create') }}">
  {!! csrf_field() !!}

    <div class="form-group{{ $errors->has('merchantName') ? ' has-error' : '' }}">
      <input type="text" class="form-control" id="merchantName" name="merchantName" placeholder="Merchant Name" value="" required>

      @if ($errors->has('merchantName'))
      <span class="help-block">
        <strong>{{ $errors->first('merchantName') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">
      <input type="text" class="form-control" id="merchantAddress1" name="merchantAddress1" placeholder="Merchant Address 1" value="" required>

      @if ($errors->has('merchantAddress1'))
      <span class="help-block">
        <strong>{{ $errors->first('merchantAddress1') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">

      <input class="form-control" id="merchantAddress2" name="merchantAddress2" value="" placeholder="Merchant Address 2" required>

      @if ($errors->has('merchantAddress2'))
      <span class="help-block">
        <strong>{{ $errors->first('merchantAddress2') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">

      <input class="form-control" id="merchantCounty" name="merchantCounty" value="" placeholder="Merchant County" required>

      @if ($errors->has('merchantCounty'))
      <span class="help-block">
        <strong>{{ $errors->first('merchantCounty') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">

      <input class="form-control" id="merchantPostcode" name="merchantPostcode" placeholder="Merchant Postcode" value="" required>

      @if ($errors->has('merchantPostcode'))
      <span class="help-block">
        <strong>{{ $errors->first('merchantPostcode') }}</strong>
      </span>
      @endif
    </div>


    <div class="form-group">

      <input class="form-control" id="merchantCountry" name="merchantCountry" value="" placeholder="Merchant Country" required>

      @if ($errors->has('merchantCountry'))
      <span class="help-block">
        <strong>{{ $errors->first('merchantCountry') }}</strong>
      </span>
      @endif
    </div>


    <div class="form-group">

      <input class="form-control" id="merchantPhone" name="merchantPhone" value="" placeholder="Merchant Phone" required>

      @if ($errors->has('merchantPhone'))
      <span class="help-block">
        <strong>{{ $errors->first('merchantPhone') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">

      <input class="form-control" id="merchantFax" name="merchantFax" value="" placeholder="Merchant Fax">

      @if ($errors->has('merchantFax'))
      <span class="help-block">
        <strong>{{ $errors->first('merchantFax') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">

      <input class="form-control" id="merchantEmail" name="merchantEmail" value="" placeholder="Merchant Email" required>

      @if ($errors->has('merchantEmail'))
      <span class="help-block">
        <strong>{{ $errors->first('merchantEmail') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">

      <input class="form-control" id="merchantWeb" name="merchantWeb" value="" placeholder="Merchant Web" required>

      @if ($errors->has('merchantWeb'))
      <span class="help-block">
        <strong>{{ $errors->first('merchantWeb') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">

      <input class="form-control" id="long" name="long" value="" placeholder="Longitute" required>

      @if ($errors->has('long'))
      <span class="help-block">
        <strong>{{ $errors->first('long') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">

      <input class="form-control" id="lat" name="lat" value="" placeholder="Latitude" required>

      @if ($errors->has('lat'))
      <span class="help-block">
        <strong>{{ $errors->first('lat') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">

      <input class="form-control" id="merchantContactName" name="merchantContactName" value="" placeholder="Merchant Contact Name" required>

      @if ($errors->has('merchantContactName'))
      <span class="help-block">
        <strong>{{ $errors->first('merchantContactName') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">

      <input class="form-control" id="merchantContactEmail" name="merchantContactEmail" value="" placeholder="Merchant Contact Email" required>

      @if ($errors->has('merchantContactEmail'))
      <span class="help-block">
        <strong>{{ $errors->first('merchantContactEmail') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">

      <input class="form-control" id="merchantContactPhone" name="merchantContactPhone" value="" placeholder="Merchant Contact Phone" required>

      @if ($errors->has('merchantContactPhone'))
      <span class="help-block">
        <strong>{{ $errors->first('merchantContactPhone') }}</strong>
      </span>
      @endif
    </div>



    <div class="form-group custom-search-form">
      <button type="submit" class="btn btn-default red">Submit </button>
    </div>

  </form>
</div>



@endsection
