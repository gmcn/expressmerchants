@extends('layouts.app')

@section('content')
<?php $title = 'Company <span>List</span>'; ?>
<div class="container-fluid user">
  <div class="row">
      <div class="col-md-12">

        @if (session('message'))
          <div class="flash-message">
           <div class="alert alert-success alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               {{ session('message') }}
           </div>
          </div>
        @endif


        @foreach($companies as $company)

        <div class="row user_entry">
          <div class="col-md-2 user_entry_email">
            <label class="main">Company Name</label>
            {{ $company->companyName }}
          </div>
          <div class="col-md-2 user_entry_email">
            <label class="main">Company Phone</label>
            {{ $company->companyPhone }}
          </div>
          <div class="col-md-2 user_entry_email">
            <label class="main">Company Fax</label>
            {{ $company->companyFax }}
          </div>
          <div class="col-md-2 user_entry_email">
            <label class="main">Company Contact</label>
            {{ $company->companyContact }}
          </div>
          <div class="col-md-4 user_entry_email">
            <label class="main">Company Address</label>
            {{ $company->companyAddress }}
          </div>
        </div>
        @endforeach

      {{ $companies->links() }}
    </div>
  </div>
</div>
@endsection
