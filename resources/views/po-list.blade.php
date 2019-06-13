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
              <th>PO #</th>
              @if (Auth::user()->accessLevel == '1')
                <th>companyId</th>
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
