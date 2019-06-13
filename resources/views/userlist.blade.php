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
              <th>Name</th>
              <th>Email</th>
              <th>Company ID</th>
              <th>Phone</th>
              <th>Access Level</th>
              <th>Disable</th>
            </tr>
          </thead>
          <tbody>


          @foreach($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->companyId }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->accessLevel }}</td>
            <td>

              @if ($user->disabled == 1)
              disabled
              @else
              <a href="{{ url('delete-user') }}/{{ $user->id }}" onclick="return confirm('This action cannot be undone, are you sure?')">x</a>
              @endif

              </td>
          </tr>
          @endforeach

          </tbody>
        </table>

        {{ $users->links() }}
      </div>
    </div>
</div>
@endsection
