@extends('layouts.app')

@section('content')
<?php $title = 'Create <span>Purchase Order</span>'; ?>
<div class="container-fluid po-create">
  <div class="row">
    <div class="col-md-5 col-lg-4 matchheight">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/po-create') }}">
      {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('poType') ? ' has-error' : '' }}">

          <label class="main">Supplier Type</label>
          <input type="radio" id="pre-approved" name="poType" value="Pre Approved" checked required>
          <label for="pre-approved">PRE-APPROVED SUPPLIER <span>(NORMAL)</label><br>
          <input type="radio" id="alternate" name="poType" value="alternate" required>
          <label for="Alternate">ALTERNATIVE SUPPLIER <span>(UNLISTED)</span></label>

          @if ($errors->has('poType'))
          <span class="help-block">
            <strong>{{ $errors->first('poType') }}</strong>
          </span>
          @endif
        </div>

        <?php
        if(empty($_GET['id'])) {

        } else {
          $id = $_GET['id'];
          $newid = str_replace(',', '', $id);
        }
        // echo $newid;
        ?>

        <div class="form-group row selectMerchant">
          <div class="col-12">
            <label class="main">Selected Merchant</label>
            <select class="form-control{{ $errors->has('companyId') ? ' is-invalid' : '' }}" name="selectMerchant" id="selectMerchant">
              <option value="">Select a merchant</option>
              @foreach($merchants as $merchant)
                <option value="{{ $merchant->id }}"
                  @if (empty($_GET['id'])) @else @if ($merchant->id == $newid) selected  @endif @endif>{{ $merchant->merchantName }}, {{ $merchant->merchantCounty }} {{ $merchant->merchantPostcode }}</option>
              @endforeach
            </select>
          </div>
        </div>


        <div class="form-group row inputMerchant" style="display: none;">
          <div class="col-12">
            <label class="main">Unlisted Merchant Details</label>
            <input class="form-control" id="inputMerchant" name="inputMerchant" value="" placeholder="Merchant Name, Address, Contact #">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-12">
            <label class="main">Order Purpose</label>
          </div>
          <div class="col-4">
            <input type="radio" id="project" name="poPurpose" value="Project" required>
            <label for="project">Project</label>
          </div>
          <div class="col-4">
          <input type="radio" id="van-stock" name="poPurpose" value="Van Stock" required>
          <label for="van-stock">Van Stock</label>
          </div>
          <div class="col-4">
            <input type="radio" id="ppm" name="poPurpose" value="Project" required>
            <label for="ppm">PPM</label>
          </div>
          @if ($errors->has('popurpose'))
          <span class="help-block">
            <strong>{{ $errors->first('poPurpose') }}</strong>
          </span>
          @endif
        </div>

        <div class="form-group row poProject">
          <div class="col-12">
            <label class="main">Task/Project Number</label>
            <input class="form-control" id="poProject" name="poProject" value="" placeholder="Input project number">

            @if ($errors->has('poProject'))
            <span class="help-block">
              <strong>{{ $errors->first('poProject') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="form-group row">
          <div class="col-6">
            <label class="main">User Name</label>
            {{ Auth::user()->name }}

            <input type="text" class="form-control d-none" id="u_id" name="u_id" placeholder="u_id" value="{{ Auth::user()->id }}">

          </div>
          <div class="col-6">
            <label class="main">Company Name</label>
            {{ $company->companyName }}

            <input type="text" class="form-control d-none" id="companyId" name="companyId" placeholder="companyId" value="{{ Auth::user()->companyId }}">

          </div>
        </div>


        <div class="form-group row">
          <div class="col-12">
            <label>Job Location</label>
            <input class="form-control" id="poProjectLocation" name="poProjectLocation" value="" placeholder="Input project location" required>
          </div>


          @if ($errors->has('poProjectLocation'))
          <span class="help-block">
            <strong>{{ $errors->first('poProjectLocation') }}</strong>
          </span>
          @endif
        </div>

        <div class="form-group row d-block d-sm-block d-md-none">
          <div class="col-12">
            <label class="main">Material Brief</label>
            <textarea class="form-control" cols="50" name="poMaterials" id="poMaterials" value=""></textarea>
          </div>
        </div>

        <div class="form-group custom-search-form">
          <button type="submit" class="btn btn-default">Submit & Generate PO</button>
        </div>


    </div>
    <div class="col-md-6 col-lg-7 textarea matchheight d-none d-md-block d-lg-block">
      <label class="main">Material Brief</label>
      <textarea class="form-control" cols="50" name="poMaterials" id="poMaterials" placeholder="Add materials" value=""></textarea>
    </div>
    </form>
  </div>

</div>



@endsection
