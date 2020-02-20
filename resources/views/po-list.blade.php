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

          @endif

          <a class="btn btn-primary" href="{{ url('/po-export') }}">Export POs</a>

          <hr />


          <p>
            <a class="filter" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              Filter

                @if ($date || $u_id || $company_id || $poPod)
                  <span><a class="clear" href="{{ url('/po-list') }}">  (clear filter)</a></span>
                  @else
                @endif


            </a>
          </p>
          <div class="collapse" id="collapseExample">
            <!-- <div class="card card-body"> -->
              <form method="GET" class="filter">
                @if (Auth::user()->accessLevel != '3')
                <div class="form-group">
                  <h3>User</h3>
                  <select class="form-control" name="u_id" id="userSearch">
                    <option value="">Select a User</option>
                    @foreach($users as $user)
                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                  </select>
                </div>
                @endif

                @if (Auth::user()->accessLevel == '1')
                <div class="form-group">
                  <h3>Company</h3>
                  <select class="form-control" name="company_id" id="companySearch">
                    <option value="">Select a Company</option>
                    @foreach($companies as $company)
                      <option value="{{ $company->id }}">{{ $company->companyName }}</option>
                    @endforeach
                  </select>
                </div>
                @endif

                @if (Auth::user()->accessLevel == '1')
                <div class="form-group">
                  <h3>Merchant</h3>
                  <select class="form-control" name="merchant_id" id="merchantSearch">
                    <option value="">Select a Merchant</option>
                    @foreach($merchants as $merchant)
                      <option value="{{ $merchant->id }}">{{ $merchant->merchantName }}</option>
                    @endforeach
                  </select>
                </div>
                @endif

                <div class="form-group">
                  <h3>PO Number</h3>
                  <input class="form-control" type="number" name="poId" placeholder="PO Number" value="{{ $poId }}">
                </div>

                <div class="form-group">
                  <h3>Task/Project #</h3>
                  <input class="form-control" type="text" name="poProject" placeholder="Task/Project #" value="{{ $poProject }}">
                </div>

                <div class="form-group">
                  <h3>Location</h3>
                  <input class="form-control" type="text" name="poLocation" placeholder="Location" value="{{ $poLocation }}">
                </div>

                <div class="form-group">
                  <h3>Date From</h3>
                  <input class="form-control" type="date" name="dateFrom" value="{{ $dateFrom }}">
                </div>

                <div class="form-group">
                  <h3>Date To</h3>
                  <input class="form-control" type="date" name="dateTo" value="{{ $dateTo }}">
                </div>

                <div class="form-group">
                  <h3>Date</h3>
                  <input class="form-control" type="date" name="date" value="{{ $date }}">
                </div>

                <div class="form-group">
                  <h3>POD Empty</h3>
                  <input class="" type="checkbox" name="poPod" value="1"> Yes<br />
                </div>
                <button> Apply Filter</button>
              </form>
            <!-- </div> -->
          </div>



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

          @if($pos->isEmpty())
          <div class="row col-12 list_nopos">
            <h2>No Purchase Orders <span>To View</span></h2>
          </div>
          @else

          @foreach($pos as $po)


          <?php $date = date('d.m.y', strtotime($po->created_at));  ?>

            <p class="date">{{ $date }}</p>



            <div class="row po_entry @if ($po->poCancelled) alert-dark @elseif ( !$po->poPod ) alert-error @elseif( !$po->poCompanyPo ) alert-warning @endif">
              <div class="col-md-3">
                <div class="vert-align">
                  @if ($po->poCancelled)
                    Cancelled
                    @else
                    {{ $po->poProject }}
                    @endif
                    <br />
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
                @if ($po->poCancelled)
                  <img src="{{ asset('/images/cancelled_pod.svg') }}" alt="Cancelled POD">
                @elseif ($po->poPod )
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
