@extends('layouts/contentNavbarLayout')

@section('title', 'BMI Calculator')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

<script>
  // Update to submit form data to server
  function calculateBMI() {
    let height = document.getElementById('height').value;
    let weight = document.getElementById('weight').value;
    let gender = document.getElementById('gender').value;

    if (height > 0 && weight > 0) {
      // Send form data to server using AJAX
      fetch('{{ route('bmi.calculate') }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
          height: height,
          weight: weight,
          gender: gender
        })
      })
      .then(response => response.json())
      .then(data => {
        // Redirect to the results page with BMI and status as query parameters
        window.location.href = '{{ route('content.bmi.result') }}?bmi=' + data.bmi.toFixed(2) + '&status=' + data.status;
      })
      .catch(error => {
        console.error('Error:', error);
      });
    } else {
      alert("Please enter valid height and weight values.");
    }
  }
</script>
@endsection

@section('content')
<div class="row gy-4">
  <!-- Welcoming -->
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-1">Welcome To FitHealth!</h4>
        <p class="pb-0">Track Your Health, Transform Your Life with FitHealth 💜</p>
      </div>
    </div>
  </div>
  <!--/ Welcoming -->

  <!-- BMI Calculator -->
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">BMI Calculator</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="bmiCalculatorOptions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="bmiCalculatorOptions">
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
            <a class="dropdown-item" href="javascript:void(0);">Update</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <!-- Explanation of BMI -->
        <p>Body Mass Index (BMI) adalah cara menghitung berat badan ideal berdasarkan tinggi dan berat badan.</p>

        <!-- Update form to include onsubmit event -->
        <form onsubmit="event.preventDefault(); calculateBMI();">
          <!-- Gender selection -->
          <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-control" id="gender">
              <option value="female">Perempuan</option>
              <option value="male">Laki-Laki</option>
            </select>
          </div>

          <!-- Height input -->
          <div class="mb-3">
            <label for="height" class="form-label">Tinggi (cm)</label>
            <input type="number" class="form-control" id="height" placeholder="Masukkan tinggi Anda dalam cm">
          </div>

          <!-- Weight input -->
          <div class="mb-3">
            <label for="weight" class="form-label">Berat (kg)</label>
            <input type="number" class="form-control" id="weight" placeholder="Masukkan berat Anda dalam kg">
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary">Hitung BMI</button>
        </form>
      </div>
    </div>
  </div>
  <!--/ BMI Calculator -->

  <!-- Other sections ... -->
</div>

<!-- Back Dashboard -->
<div class="layout-demo-wrapper">
    <button class="btn btn-primary" type="button" onclick="history.back()">Back</button>
</div>
<!--/ Back Dashboard -->

@endsection
