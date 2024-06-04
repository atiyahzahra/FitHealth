@extends('layouts/contentNavbarLayout')

@section('title', 'Water Intake Tracker')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>

<script>
  function updateWaterIntake() {
    let target = document.getElementById('targetWater').value;
    let consumed = document.getElementById('consumedWater').value;

    if (target > 0 && consumed >= 0) {
      // Save the values to local storage
      localStorage.setItem('waterTarget', target);
      localStorage.setItem('waterConsumed', consumed);

      // Update the display
      document.getElementById('waterTarget').innerHTML = target + " ml";
      document.getElementById('waterConsumed').innerHTML = consumed + " ml";
      document.getElementById('waterRemaining').innerHTML = (target - consumed) + " ml";
    } else {
      alert("Please enter valid values for target and consumed water.");
    }
  }

  function loadWaterIntake() {
    let target = localStorage.getItem('waterTarget') || 0;
    let consumed = localStorage.getItem('waterConsumed') || 0;

    document.getElementById('waterTarget').innerHTML = target + " ml";
    document.getElementById('waterConsumed').innerHTML = consumed + " ml";
    document.getElementById('waterRemaining').innerHTML = (target - consumed) + " ml";
  }

  document.addEventListener('DOMContentLoaded', loadWaterIntake);
</script>
@endsection


<style>
 .background-text {
  background-color: #9055FD;
  display: inline-flex;
  padding:5px;
  font-size:20px;
 }
 .background-container{
  text-align: center;
 }
</style>

@section('content')

<div class="container">
  @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
    @endif

  @if(session('warning'))
          <div class="alert alert-warning">
              {{ session('warning') }}
          </div>
      @endif
  <div class="container-flex mt-5">
    <h3>Target</h3>
    <form action="{{ route('water_intake_target.store') }}" method="POST">
      @csrf
      <div>
        <div class="pb-2 form-group">
          <label for="target_amount">Target Amount (ml)</label>
          <input type="number" class="form-control" id="target" name="target" value="{{ old('target', $target->target ?? '') }}" required>
        </div>
        <div class="container">
          </div>
          <button type="submit" class="btn btn-primary ">Save</button>
        </form>
      <div class="mt-5">
  </div>
  <div class="container-flex pt-4">
      <h3>Current Consumption</h3>
      <div class="background-container">
        <p class=" rounded background-text text-white"><strong>{{ $target->consumed ?? 0 }} / {{ $target->target ?? 'No target set' }} ml</strong></p>
      </div>

      <form action="{{ route('water_intake_target.updateConsumed') }}" method="POST">
          @csrf
          <div class="form-group pb-1">
              <label for="consumed">Add Consumed Amount (ml)</label>
              <input type="number" class="form-control" id="consumed" name="consumed" required>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
      </form>

      <form action="{{ route('water_intake_target.resetConsumed') }}" method="POST" style="margin-top: 20px;">
          @csrf
          <button type="submit" class="btn btn-danger">Reset Consumption</button>
      </form>
  </div>
</div>
@endsection
