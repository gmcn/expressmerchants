@extends('layouts.app')

@section('content')
<?php $title = 'Merchant <span>List</span>'; ?>
<div class="container-fluid map">
    <div class="row">

      <div class="col-md-7">
        <div id="panel" style="width: 100%;"></div>
      </div>
      <div class="col-md-5 d-none d-md-block">
        <div id="map" style="width: 100%;"></div>
      </div>

      <div><select id="locationSelect" style="width: 10%; visibility: hidden"></select></div>

    </div>
</div>
@endsection