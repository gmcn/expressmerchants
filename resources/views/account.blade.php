@extends('layouts.app')

@section('content')
<?php $title = 'User Account <span>Details</span>'; ?>
<div class="container-fluid po_list">
    <div class="row justify-content-center">
      <div class="col-md-5 col-lg-3 contactdetails">

          <h3>Company</h3>
          <p class="company">{{ $company->companyName }}</p>
          <h3>Operator</h3>
          <p>{{ Auth::user()->name }}</p>

      </div>
        <div class="col-md-7 col-lg-9">

          <p>Name <br /> {{ Auth::user()->name }}</p>

          <p>Phone <br /> {{ Auth::user()->phone }}</p>

          <p>Email <br /> <a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></p>


      </div>
    </div>
</div>
@endsection
