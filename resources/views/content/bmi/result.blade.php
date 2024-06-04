@extends('layouts/contentNavbarLayout')

@section('title', 'BMI Result')

@section('content')
<div class="row gy-4">
  <!-- BMI Result -->
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between bg-primary text-white">
        <h5 class="card-title m-0 me-2">BMI Result</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="bmiResultOptions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px text-white"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="bmiResultOptions">
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
            <a class="dropdown-item" href="javascript:void(0);">Update</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <!-- BMI result display -->
        <h5 class="card-title">Your BMI: <span id="bmiOutput" class="text-primary">{{ request()->get('bmi') }}</span></h5>
        <p>Status: <span id="bmiStatus" class="text-primary">{{ request()->get('status') }}</span></p>

        @if (request()->get('status') == 'Underweight')
          <p class="text-danger">Utamakan hidup sehat dan perhatikan konsumsi harian</p>
        @elseif (request()->get('status') == 'Normal weight')
          <p class="text-success">Pastikan asupan kalori sesuai dengan kebutuhan kalori harian & konsumsi makanan sehat</p>
        @elseif (request()->get('status') == 'Overweight')
          <p class="text-warning">Uamakan hidup sehat dan perhatikan konsumsi harian</p>
        @elseif (request()->get('status') == 'Obese')
          <p class="text-danger">Utamakan hidup sehat dan perhatikan konsumsi harian</p>
        @endif

        <!-- Re-check button -->
        <button type="button" class="btn btn-secondary mt-3" onclick="window.location.href='{{ route('layouts-without-menu') }}'">Check Again</button>
      </div>
    </div>
  </div>
  <!--/ BMI Result -->

  <!-- Other sections ... -->
</div>

<!-- Back Dashboard -->
<div class="layout-demo-wrapper">
    <button class="btn btn-primary" type="button" onclick="history.back()">Back</button>
</div>
<!--/ Back Dashboard -->

@endsection
