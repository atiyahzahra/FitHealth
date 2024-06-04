@extends('layouts/contentNavbarLayout')

@section('title', 'Food Track')

@section('content')
<div class="row gy-4">
    <div class="col-lg-12">
        <div class="card" style="padding: 2rem;">
            <div class="card-header text-center">
                <h4 class="card-title mb-0">Food Track</h4>
                <p class="mb-0">Catat makanan yang dikonsumsi 📅</p>
            </div>
            <div class="card-body">
                <form action="{{ route('content.foodtrack.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="jenis_makanan" class="form-label">Jenis Makanan</label>
                        <select class="form-select" id="jenis_makanan" name="jenis_makanan">
                            <option value="makanan_ringan">Makanan Ringan</option>
                            <option value="makanan_berat">Makanan Berat</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="item_makanan" class="form-label">Item Makanan</label>
                        <input type="text" class="form-control" id="item_makanan" name="item_makanan" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_makan" class="form-label">Tanggal Makan</label>
                        <input type="date" class="form-control" id="tanggal_makan" name="tanggal_makan" required>
                    </div>
                    <div class="mb-3">
                        <label for="waktu_makan" class="form-label">Waktu Makan</label>
                        <select class="form-select" id="waktu_makan" name="waktu_makan">
                            <option value="sarapan">Sarapan</option>
                            <option value="makan_siang">Makan Siang</option>
                            <option value="makan_malam">Makan Malam</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-style')
<style>
    .card {
        padding: 2rem;
    }
    .card-header {
        padding: 1.5rem;
    }
    .card-title {
        font-size: 1.75rem;
        font-weight: bold;
    }
    .card-header p {
        font-size: 1.125rem;
        margin-top: 0.5rem;
    }
    .form-label {
        font-size: 1rem;
    }
    .form-select, .form-control {
        font-size: 0.875rem;
    }
    .btn-primary {
        font-size: 1rem;
        padding: 0.5rem 1rem;
    }
</style>
@endsection
