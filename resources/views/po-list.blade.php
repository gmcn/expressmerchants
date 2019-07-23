@extends('layouts.app')

@section('content')
<?php $title = 'Purchase Order <span>List</span>'; ?>
<div class="container-fluid po_list">
    <div class="row justify-content-center">
      <div class="col-md-5 col-lg-3 contactdetails">



          <h3>Company</h3>
          <p class="company">{{ $company->companyName }}</p>
          <h3>Operator</h3>
          <p>{{ Auth::user()->name }}</p>

          @if (Auth::user()->accessLevel == '3' || Auth::user()->accessLevel == '2')

            <h3>For assistance please call</h3>
            <p class="phone">{{ $adminusr->phone }}</p>

          @endif

          @if (Auth::user()->accessLevel == '1')
            <a href="{{ url('/po-export') }}">Export POs</a>
          @endif

      </div>
        <div class="col-md-7 col-lg-9 list">

          @if (session('message'))
            <div class="flash-message">
             <div class="alert alert-success alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 {{ session('message') }}
             </div>
            </div>
          @endif

          <form>
            <input name="search" type="text" class="form-control" placeholder="Search POs...." value="{{ $search }}">
            @if ($search)
            <a class="clearsearch" href="{{ url('/po-list') }}">x</a>
            @endif
          </form>

          @if($pos->isEmpty())
          <div class="row col-12">
            No Purchase Orders
          </div>
          @else

          @foreach($pos as $po)


          <?php $date = date('d.m.y', strtotime($po->created_at));  ?>

            <p class="date">{{ $date }}</p>

            <div class="row po_entry @if (!$po->poPod ) warning @endif">

              <div class="col-md-3">
                <div class="vert-align">
                {{ $po->poProject }}<br />
                  <a href="{{ url('/po-edit') }}/{{ $po->id }}">VIEW FULL P/O</a>
                </div>
              </div>
              <div class="col-6 col-md-4 po_number">
                <div class="vert-align">
                EM-{{ $po->id }}
                </div>
              </div>
              <div class="col-3 col-md-3">
                @if (Auth::user()->accessLevel == '1')
                  <div class="vert-align">
                    {{ $po->companyName }}
                  </div>
                @endif
              </div>
              <div class="col-3 col-md-2 add_pod">
                @if ($po->poPod )
                  <img src="{{ asset('/images/uploaded_pod.svg') }}" alt="Uploaded POD">
                @else
                  <a href="{{ url('/po-edit') }}/{{ $po->id }}">
                    <img src="{{ asset('/images/upload_pod.svg') }}" alt="Upload POD">
                  </a>
                @endif
              </div>
            </div>

            <hr />

          @endforeach

          @endif

          </tbody>
        </table>

        {{ $pos->links() }}

      </div>
    </div>
</div>
@endsection
