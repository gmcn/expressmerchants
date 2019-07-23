@extends('layouts.app')

@section('content')
<?php $title = 'Purchase Order <span>Created</span>'; ?>
<div class="container-fluid po-created">
  <div class="row">
    <div class="col-md-5 col-lg-3 po-created_instructions">
      <label>Purchase Order Number For Merchant</label>
      <p class="po-created_instructions_id">
        @if (session('message'))
           <span>EM-</span>{{ session('message') }}
        @endif

      </p>

      <label>What we do next</label>



      <div class="row">
        <div class="col-6 instruction">
          <span>#01</span>
          @if (session('poType') == 'alternate')
            <img src="{{ asset('/images/alt_po.svg') }}" alt="You must phone this number to have payment issued over the phone via credit card. Please quote the above P/O number to the merchant.">
            <a href="tel:028 3835 1388">028 3835 1388</a>
            <p>You must phone this number to have payment issued over the phone via credit card. Please quote the above P/O number to the merchant.</p>
          @else
            <img src="{{ asset('/images/present_po.svg') }}" alt="Give this number to the merchant when collecting the goods">
            <p>You must give this number to the merchant when collecting the goods.</p>
          @endif




        </div>

        <div class="col-6 instruction">
          <span>#02</span> <img src="{{ asset('/images/present_pod.svg') }}" alt="Give this number to the merchant when collecting the goods">
          <p>Once the goods are collected you must insist a Proof of delivery Docket or receipt is issued and uploaded to this P/O via photo.</p>
        </div>

        <div class="col-12">
          <a href="{{ url('/po-create') }}" class="btn new">Create New Purchase Order</a>
        </div>

        <div class="col-12">
          <a href="{{ url('/po-list') }}" class="btn manage">View Purchase Orders</a>
        </div>

      </div>


    </div>
    <div class="col-md-5">

    </div>
  </div>

</div>



@endsection
