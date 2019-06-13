@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
              <th>Merchant Name</th>
              <th>Merchant Phone</th>
              <th>Merchant Fax</th>
              <th>Merchant Contact</th>
              <th>Merchant ContactEmail</th>
              <th>Merchant Address</th>
              <th>Remove</th>
            </tr>
          </thead>
          <tbody>


          @foreach($merchants as $merchant)
          <tr>
            <td>{{ $merchant->merchantName }}</td>
            <td>{{ $merchant->merchantPhone }}</td>
            <td>{{ $merchant->merchantEmail }}</td>
            <td>{{ $merchant->merchantContactName }}</td>
            <td>{{ $merchant->merchantContactEmail }}</td>
            <td>{{ $merchant->merchantAddress1 }} <br  />{{ $merchant->merchantAddress2 }}  </td>
            <td>
              <a href="{{ url('merchant-delete') }}/{{ $merchant->id }}" onclick="return confirm('This action cannot be undone, are you sure?')">x</a>
            </td>
          </tr>
          @endforeach

          </tbody>
        </table>

        {{ $merchants->links() }}
      </div>
    </div>
</div>
@endsection
