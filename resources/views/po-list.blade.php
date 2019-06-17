@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-4 col-lg-2">

        @if (Auth::user()->accessLevel == '3')

          <h3>Company</h3>
          {{ $adminusr->name }}
          <h3>Operator</h3>
          {{ $adminusr->email }}
          <h3>For assistance please call</h3>
          {{ $adminusr->phone }}

        @endif

      </div>
        <div class="col-md-8 col-lg-10">

          @if (session('message'))
            <div class="flash-message">
             <div class="alert alert-success alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 {{ session('message') }}
             </div>
            </div>
          @endif

          <form>
            <input name="search" type="text" class="form-control" placeholder="Search..." value="{{ $search }}">
            @if ($search)
            <a href="/po-list">clear search</a>
            @endif
          </form>



          <table class="table">
          <thead>
            <tr>
              <th>PO #</th>
              @if (Auth::user()->accessLevel == '1')
              <th>Company Name</th>
              @endif
              <th>Type</th>
              <th>Purpose</th>
              <th>Project</th>
              @if (Auth::user()->accessLevel == '1')
                <th>Edit</th>
              @endif
            </tr>
          </thead>
          <tbody>

          @foreach($pos as $po)
          <tr>
            <td>{{ $po->id }}</td>
            @if (Auth::user()->accessLevel == '1')
              <td>{{ $po->companyName }}</td>
            @endif
            <td>{{ $po->poType }}</td>
            <td>{{ $po->poPurpose }}</td>
            <td>{{ $po->poProject }}</td>
            @if (Auth::user()->accessLevel == '1')
              <th><a href="/po-edit/{{ $po->id }}">edit</a> </th>
            @endif
          </tr>
          @endforeach

          </tbody>
        </table>

        {{ $pos->links() }}

      </div>
    </div>
</div>
@endsection
