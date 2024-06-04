@extends('layouts/contentNavbarLayout')

@section('title', 'Medication Reminder')

@section('content')
<div class="row gy-4">
    <div class="col-lg-12">
        <div class="card" style="padding: 2rem;">
            <div class="card-header text-center">
                <h4 class="card-title mb-0">Medication Remember</h4>
                <p class="mb-0">Catat obat yang dikonsumsi dan buat pengingat ⏰</p>
            </div>
            <div class="card-body position-relative">
                <div class="table-responsive">
                    @if($obats->isEmpty())
                        <p class="text-center">Belum ada obat dan pengingat minum obat yang ditambahkan</p>
                    @else
                        <table class="table table-striped" style="margin-bottom: 20px;">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama Obat</th>
                                    <th class="text-center">Dosis</th>
                                    <th class="text-center">Jam Minum</th>
                                    <th class="text-center">Aturan Minum</th>
                                    <th class="text-center">Lama Konsumsi</th>
                                    <th class="text-center">Periode Minum</th>
                                    <th class="text-center">Tanggal Mulai Minum</th>
                                    <th class="text-center">Catatan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($obats as $obat)
                                    <tr>
                                    <td class="text-center">{{ $obat->nama_obat }}</td>
                                    <td class="text-center">{{ $obat->dosis }} {{ $obat->satuan }}</td>
                                    <td class="text-center">{{ implode(', ', $obat->jam_minum) }}</td>
                                    <td class="text-center">{{ str_replace('_', ' ', $obat->aturan_minum) }}</td>
                                    <td class="text-center">{{ $obat->lama_konsumsi }} {{ $obat->satuan_konsumsi }}</td>
                                    <td class="text-center">
                                        @if($obat->periode === 'setiap_hari')
                                            Setiap Hari
                                        @else
                                            {{ implode(', ', explode(', ', $obat->periode)) }}
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $obat->tanggal_mulai }}</td>
                                    <td class="text-center">{{ $obat->catatan }}</td>
                                    <td class="text-center">                                            <div class="dropdown">
                                                <button class="btn p-0" type="button" id="actionDropdown{{ $obat->id }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical mdi-24px"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="actionDropdown{{ $obat->id }}">
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="location.reload();">Refresh</a>
                                                    <a class="dropdown-item" href="{{ route('content.obat.edit', $obat->id) }}">Edit</a>
                                                    <form action="{{ route('content.obat.destroy', $obat->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                <div class="position-absolute bottom-20 start-50 translate-middle-x">
                    <a href="{{ route('content.obat.create') }}" class="btn btn-primary btn-floating">
                        <i class="mdi mdi-plus"></i>
                    </a>
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
    .table-responsive p {
        font-size: 1rem;
        margin: 1.5rem 0;
    }
    .table th, .table td {
        font-size: 0.875rem;
        vertical-align: middle;
    }
    .table th {
        text-align: center;
    }
    .btn-floating {
        font-size: 1.25rem;
        padding: 0.5rem 1rem;
    }
    .position-absolute {
        position: absolute !important;
    }
    .bottom-0 {
        bottom: 0 !important;
    }
    .start-50 {
        left: 50% !important;
    }
    .translate-middle-x {
        transform: translateX(-50%);
    }
    .m-3 {
        margin: 1rem !important;
    }
</style>
@endsection
