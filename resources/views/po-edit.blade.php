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
              {{ $po->name }}

            </div>
            <div class="col-6">
              <label class="main">Company Name</label>
              {{ $po->companyName }}
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


        @if ($po->merchantName)
          <div class="form-group">
            <label class="main">Selected Merchant</label>
            {{ $po->merchantName }}
          </div>
        @else
          <div class="form-group">
            <label class="main">Selected Merchant</label>
            {{ $po->inputMerchant }}
            <input type="text" class="form-control d-none" id="inputMerchant" name="inputMerchant" value="{{ $po->inputMerchant }}">
          </div>
        @endif

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

        <div class="form-group row">
          <div class="col-md-6">
            <label class="main">P/O Value</label>
            <input class="form-control" id="poValue" name="poValue" value="{{ $po->poValue }}" placeholder="Add P/O Value">

            @if ($errors->has('poValue'))
            <span class="help-block">
              <strong>{{ $errors->first('poValue') }}</strong>
            </span>
            @endif
          </div>

          @if(Auth::user()->accessLevel == 1)
          <div class="col-md-6">
            <label class="main">Cost Sheet</label>
            <input class="form-control" id="poCostSheet" name="poCostSheet" value="{{ $po->poCostSheet }}" placeholder="Add Cost Sheet">

            @if ($errors->has('poCostSheet'))
            <span class="help-block">
              <strong>{{ $errors->first('poCostSheet') }}</strong>
            </span>
            @endif
          </div>
          @endif

        </div>

        @if(Auth::user()->accessLevel == 1)

          <div class="form-group row">
            <div class="col-md-6">
              <label class="main">Merchant Invoice #</label>
              <input class="form-control" id="poInvoice" name="poInvoice" value="{{ $po->poInvoice }}" placeholder="Add Merchant Invoice #">

              @if ($errors->has('poInvoice'))
              <span class="help-block">
                <strong>{{ $errors->first('poInvoice') }}</strong>
              </span>
              @endif
            </div>
            <div class="col-md-6">
              <label class="main">EM Invoice #</label>
              <input class="form-control" id="poEMInvoice" name="poEMInvoice" value="{{ $po->poEMInvoice }}" placeholder="Add EM Invoice #">

              @if ($errors->has('poEMInvoice'))
              <span class="help-block">
                <strong>{{ $errors->first('poEMInvoice') }}</strong>
              </span>
              @endif
            </div>
          </div>

        @endif


        @if(Auth::user()->accessLevel == 2 && $po->poInvoice)

            <div class="form-group">
              <label class="main">Merchant Invoice #</label>
              {{ $po->poInvoice }}
            </div>

        @endif

        @if(Auth::user()->accessLevel == 2 && $po->poEMInvoice)

            <div class="form-group">
              <label class="main">EM Invoice #</label>
              {{ $po->poEMInvoice }}
            </div>

        @endif


        <div class="form-group">

          @if ($po->poPod)
          <label class="main">View Proof of Delivery</label>
          <a href="{{ url('/uploads/') }}/{{ $po->id }}.jpg" target="_blank">View POD</a><br />
          <a href="{{ url('/uploads/') }}/{{ $po->id }}.jpg" download>Download POD</a>
          <br /><br />
          <label class="main">Update Proof of Delivery</label>
          <input type="file" id="poPod" name="poPod" accept="image/jpeg">
          @else

          <label class="main">Proof of Delivery</label>
            <input type="file" id="poPod" name="poPod" accept="image/jpeg">


          @endif



          @if ($errors->has('poPod'))
          <span class="help-block">
            <strong>{{ $errors->first('poPod') }}</strong>
          </span>
          @endif
        </div>

        @if(Auth::user()->accessLevel == 1 || Auth::user()->accessLevel == 2)

          <div class="form-group">
            <label class="main">Company P/O</label>
            <input class="form-control" id="poCompanyPo" name="poCompanyPo" value="{{ $po->poCompanyPo }}" placeholder="Add Company P/O #">

            @if ($errors->has('poCompanyPo'))
            <span class="help-block">
              <strong>{{ $errors->first('poCompanyPo') }}</strong>
            </span>
            @endif
          </div>

        @endif

        @if(Auth::user()->accessLevel == 1)

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="name" class="col-form-label">{{ __('Job Status') }}</label>

              <select class="form-control" name="poJobStatus" id="poJobStatus">
                <option value="">Select an job status</option>
                <option value="1" @if ($po->poJobStatus == 1) selected @endif>New Purchase</option>
                <option value="2" @if ($po->poJobStatus == 2) selected @endif>100% Complete</option>
              </select>

              @if ($errors->has('poJobStatus'))
              <span class="help-block">
                <strong>{{ $errors->first('poJobStatus') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="name" class="col-form-label">{{ __('Finance Status') }}</label>

              <select class="form-control" name="poFinanceStatus" id="poFinanceStatus">
                <option value="">Select a finance status</option>
                <option value="1" @if ($po->poFinanceStatus == 1) selected @endif>No Action Required</option>
                <option value="2" @if ($po->poFinanceStatus == 2) selected @endif>Pending Invoice</option>
                <option value="3" @if ($po->poFinanceStatus == 3) selected @endif>Awaiting Payments</option>
                <option value="4" @if ($po->poFinanceStatus == 4) selected @endif>100% Paid</option>
              </select>

              @if ($errors->has('poFinanceStatus'))
              <span class="help-block">
                <strong>{{ $errors->first('poFinanceStatus') }}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>



        @endif




        @if (!$po->poNotes)
          <p>
          <a class="main" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Click here to add a note
          </a>
          </p>

          <div class="collapse form-group" id="collapseExample">
            <!-- <div class="card card-body"> -->
              <input class="form-control" id="poNotes" name="poNotes" value="" placeholder="Add a P/O note">
            <!-- </div> -->
            @if ($errors->has('poNotes'))
            <span class="help-block">
              <strong>{{ $errors->first('poNotes') }}</strong>
            </span>
            @endif
          </div>
        @else
          <p>
          <a class="main" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Click here to view/add a note
          </a>
        </p>

        <div class="collapse form-group" id="collapseExample">
          <!-- <div class="card card-body"> -->
            <input class="form-control" id="poNotes" name="poNotes" value="{{ $po->poNotes }}">
          <!-- </div> -->
          @if ($errors->has('poNotes'))
          <span class="help-block">
            <strong>{{ $errors->first('poNotes') }}</strong>
          </span>
          @endif
        </div>
        @endif



        @if ($po->poCancelled)

        @else
          <div class="form-group">
            <label class="main">Cancel?</label>
            <input type="checkbox" class="form-control" id="poCancelled" name="poCancelled" value="1">

            @if ($errors->has('poCompanyPo'))
            <span class="help-block">
              <strong>{{ $errors->first('poCancelled') }}</strong>
            </span>
            @endif
          </div>


          <div style="display: none;">
            <label class="main">Cancelled By</label>
            <input class="form-control" id="poCancelledBy" name="poCancelledBy" value="{{ Auth::user()->name }}">

            @if ($errors->has('poCancelledBy'))
            <span class="help-block">
              <strong>{{ $errors->first('poCancelledBy') }}</strong>
            </span>
            @endif
          </div>

        @endif

        @if ($po->poCancelled)
        <div class="alert alert-danger" role="alert">
          This P/O has been cancelled by <strong>{{ $po->poCancelledBy }}</strong> and cannot be edited/updated
        </div>
        @else
        <div class="form-group custom-search-form">
          <button type="submit" class="btn btn-default">Update</button>
        </div>
        @endif



    </div>
    <div class="col-md-6 col-lg-7 textarea">
      <label class="main">Material Brief</label>
      {{ $po->poMaterials }}
      <input class="form-control d-none" type="textarea" name="poMaterials" id="poMaterials" value="{{ $po->poMaterials }}">

    </div>
    </form>
</div>



@endsection
