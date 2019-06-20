@extends('layouts.app')

@section('content')

<div class="container">
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/po-edit/') }}/{{ $po->id }}" enctype="multipart/form-data">
  {!! csrf_field() !!}
    <div class="form-group{{ $errors->has('poType') ? ' has-error' : '' }}">

      <div class="form-group">
        {{ Auth::user()->name }}
      </div>
      <div class="form-group">
        {{ Auth::user()->companyId }}
      </div>

      <div class="form-group">
        <input type="text" class="form-control" id="companyId" name="companyId" placeholder="companyId" value="{{ Auth::user()->companyId }}">
      </div>

      <div class="form-group">
        <input type="text" class="form-control" id="u_id" name="u_id" placeholder="u_id" value="{{ Auth::user()->id }}">
      </div>

    </div>

    <div class="form-group">

      <input type="text" class="form-control" id="poPurpose" name="poPurpose" value="{{ $po->poPurpose }}">

    </div>

    <div class="form-group">

      <input class="form-control" id="poProject" name="poProject" value="{{ $po->poProject }}">

    </div>

    <div class="form-group">
      <input type="text" class="form-control" id="poType" name="poType" placeholder="poType" value="{{ $po->poType }}">
    </div>

    <div class="form-group">
      <input class="form-control" id="poProjectLocation" name="poProjectLocation" value="{{ $po->poProjectLocation }}">
    </div>

    @if(Auth::user()->id == 1)

      <div class="form-group">

        <input class="form-control" id="poInvoice" name="poInvoice" value="{{ $po->poInvoice }}" placeholder="Add Merchant Invoice #">

        @if ($errors->has('poInvoice'))
        <span class="help-block">
          <strong>{{ $errors->first('poInvoice') }}</strong>
        </span>
        @endif
      </div>

    @endif

    <div class="form-group">

      @if ($po->poPod)
      <a href="{{ url('/uploads/') }}/{{ $po->id }}.jpg" target="_blank">View POD</a><br />
      <a href="{{ url('/uploads/') }}/{{ $po->id }}.jpg" download>Download POD</a>
      @else
      <input type="file" id="poPod" name="poPod" accept="image/jpeg">
      @endif



      @if ($errors->has('poPod'))
      <span class="help-block">
        <strong>{{ $errors->first('poPod') }}</strong>
      </span>
      @endif
    </div>

    @if(Auth::user()->id == 1)

      <div class="form-group">

        <input class="form-control" id="poCompanyPo" name="poCompanyPo" value="{{ $po->poCompanyPo }}" placeholder="Add Company Po #">

        @if ($errors->has('poCompanyPo'))
        <span class="help-block">
          <strong>{{ $errors->first('poCompanyPo') }}</strong>
        </span>
        @endif
      </div>

    @endif

    <div class="form-group custom-search-form">
      <button type="submit" class="btn btn-default">Submit </button>
    </div>

  </form>
</div>



@endsection
