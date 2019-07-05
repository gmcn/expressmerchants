@extends('layouts.app')

@section('content')
<?php $title = 'Edit <span>Purchase Order</span>'; ?>
<div class="container-fluid po-create">
  <div class="row">
    <div class="col-md-5 col-lg-4">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/po-edit/') }}/{{ $po->id }}" enctype="multipart/form-data">
      {!! csrf_field() !!}
        <div class="form-group{{ $errors->has('poType') ? ' has-error' : '' }}">

          <div class="form-group row">
            <div class="col-6">
              <label class="main">Name</label>
              {{ Auth::user()->name }}
            </div>
            <div class="col-6">
              <label class="main">Company Name</label>
              {{ $company->companyName }}
            </div>
          </div>

          <div class="form-group">
            <input type="text" class="form-control d-none" id="companyId" name="companyId" placeholder="companyId" value="{{ $po->companyId }}">
          </div>

          <div class="form-group">
            <input type="text" class="form-control d-none" id="u_id" name="u_id" placeholder="u_id" value="{{ $po->u_id }}">
          </div>

        </div>

        <div class="form-group">
          <label class="main">Supplier Type</label>
          {{ $po->poType }}
          <input type="text" class="form-control d-none" id="poPurpose" name="poPurpose" value="{{ $po->poPurpose }}">

        </div>

        <div class="form-group">
          <label class="main">Task/Project</label>
          {{ $po->poProject }}
          <input class="form-control d-none" id="poProject" name="poProject" value="{{ $po->poProject }}">

        </div>

        <div class="form-group">
          <label class="main">Order Purpose</label>
          {{ $po->poPurpose }}
          <input type="text" class="form-control d-none" id="poType" name="poType" placeholder="poType" value="{{ $po->poType }}">
        </div>

        <div class="form-group">
          <label class="main">Project Location</label>
          {{ $po->poProjectLocation }}
          <input class="form-control d-none" id="poProjectLocation" name="poProjectLocation" value="{{ $po->poProjectLocation }}">
        </div>

        @if(Auth::user()->accessLevel == 1)

          <div class="form-group">
            <label class="main">Merchant Invoice</label>
            <input class="form-control" id="poInvoice" name="poInvoice" value="{{ $po->poInvoice }}" placeholder="Add Merchant Invoice #">

            @if ($errors->has('poInvoice'))
            <span class="help-block">
              <strong>{{ $errors->first('poInvoice') }}</strong>
            </span>
            @endif
          </div>

        @endif

        <div class="form-group">
          <label class="main">Proof of Delivery</label>
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

        @if(Auth::user()->accessLevel == 1)

          <div class="form-group">
            <label class="main">3rd Party/Company Invoice</label>
            <input class="form-control" id="poCompanyPo" name="poCompanyPo" value="{{ $po->poCompanyPo }}" placeholder="Add Company Po #">

            @if ($errors->has('poCompanyPo'))
            <span class="help-block">
              <strong>{{ $errors->first('poCompanyPo') }}</strong>
            </span>
            @endif
          </div>

        @endif

        <div class="form-group custom-search-form">
          <button type="submit" class="btn btn-default">Update</button>
        </div>

      </form>
    </div>
    <div class="col-md-5">

    </div>
</div>



@endsection
