@extends('layouts.app')

@section('content')

<div class="container">
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/po-create') }}">
  {!! csrf_field() !!}
    <div class="form-group{{ $errors->has('poType') ? ' has-error' : '' }}">

      <input type="text" class="form-control" id="companyId" name="companyId" placeholder="companyId" value="{{ Auth::user()->companyId }}">

      <input type="text" class="form-control" id="u_id" name="u_id" placeholder="u_id" value="{{ Auth::user()->id }}">

      <input type="radio" id="pre-approved" name="poType" value="Pre Approved">
      <label for="pre-approved">PRE-APPROVED (NORMAL)</label><br>
      <input type="radio" id="alternate" name="poType" value="alternate">
      <label for="Alternate">ALTERNATIVE SUPPLIER (UNLISTED)</label>

      @if ($errors->has('poType'))
      <span class="help-block">
        <strong>{{ $errors->first('poType') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">

      <input type="radio" id="project" name="poPurpose" value="Project">
      <label for="project">Project</label><br>
      <input type="radio" id="van-stock" name="poPurpose" value="Van Stock">
      <label for="van-stock">Van Stock</label><br>
      <input type="radio" id="ppm" name="poPurpose" value="PPM">
      <label for="ppm">PPM</label>

      @if ($errors->has('popurpose'))
      <span class="help-block">
        <strong>{{ $errors->first('poPurpose') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">

      <input class="form-control" id="poProject" name="poProject" value="" placeholder="Task/Project Number">

      @if ($errors->has('poProject'))
      <span class="help-block">
        <strong>{{ $errors->first('poProject') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">
      {{ Auth::user()->name }}
    </div>
    <div class="form-group">
      {{ Auth::user()->companyId }}
    </div>

    <div class="form-group">

      <input class="form-control" id="poProjectLocation" name="poProjectLocation" value="" placeholder="JOB LOCATION" required>

      @if ($errors->has('poProjectLocation'))
      <span class="help-block">
        <strong>{{ $errors->first('poProjectLocation') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group custom-search-form">
      <button type="submit" class="btn btn-default">Submit </button>
    </div>

  </form>
</div>



@endsection
