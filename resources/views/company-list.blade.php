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

        <table class="table">
        <thead>
          <tr>
            <th>Company Name</th>
            <th>Company Phone</th>
            <th>Company Fax</th>
            <th>Company Contact</th>
            <th>Company Contact Email</th>
            <th>Company Address</th>
          </tr>
        </thead>
        <tbody>


        @foreach($companies as $company)
        <tr>
          <td>{{ $company->companyName }}</td>
          <td>{{ $company->companyPhone }}</td>
          <td>{{ $company->companyFax }}</td>
          <td>{{ $company->companyContact }}</td>
          <td>{{ $company->companyContactEmail }}</td>
          <td>{{ $company->companyAddress }}</td>
        </tr>
        @endforeach

        </tbody>
      </table>

      {{ $companies->links() }}
    </div>
  </div>
</div>
@endsection
