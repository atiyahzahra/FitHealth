@extends('layouts/contentNavbarLayout')

@section('title', 'Food Track List')

@section('content')
<div class="row gy-4">
    <div class="col-lg-12">
        <div class="card" style="padding: 2rem;">
            <div class="card-header text-center">
                <h4 class="card-title mb-0">Food Track List</h4>
                <p class="mb-0">Daftar makanan yang dikonsumsi 📋</p>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Makanan</th>
                                <th>Item Makanan</th>
                                <th>Tanggal Makan</th>
                                <th>Waktu Makan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($foodTracks as $foodTrack)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ str_replace('_', ' ', $foodTrack->jenis_makanan) }}</td>
                                    <td>{{ $foodTrack->item_makanan }}</td>
                                    <td>{{ $foodTrack->tanggal_makan }}</td>
                                    <td>{{ $foodTrack->waktu_makan }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No food records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="text-center" style="margin-top: 2rem;">
                    <a href="{{ route('content.foodtrack.create') }}" class="btn btn-primary">+</a>
                </div>
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
    .table {
        margin-top: 1.5rem;
    }
    .table th, .table td {
        font-size: 0.875rem;
        text-align: center;
    }
    .btn-primary {
        font-size: 1rem;
        padding: 0.5rem 1rem;
    }
</style>
@endsection
