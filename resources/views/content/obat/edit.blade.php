@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Detail Obat')

@section('content')
<div class="row gy-4">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Detail Obat</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('content.obat.update', $obat->id) }}" method="POST" id="form-pengingat">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama-obat" class="form-label">Nama Obat</label>
                        <input type="text" class="form-control" id="nama-obat" name="nama_obat" value="{{ $obat->nama_obat }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="dosis" class="form-label">Dosis</label>
                        <div class="row">
                            <div class="col">
                                <input type="number" class="form-control" id="dosis" name="dosis" value="{{ $obat->dosis }}" required>
                            </div>
                            <div class="col">
                                <select class="form-select" name="satuan" required>
                                    <option value="tablet">Tablet</option>
                                    <option value="kaplet">Kaplet</option>
                                    <option value="kapsul">Kapsul</option>
                                    <option value="ml">Ml</option>
                                    <option value="mg">Mg</option>                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="periode-minum" class="form-label">Periode Minum</label>
                        <select class="form-select" id="periode" name="periode" required>
                            <option value="{{ implode(', ', explode(', ', $obat->periode)) }}">{{ implode(', ', explode(', ', $obat->periode)) }}</option>
                            <option value="setiap_hari">Setiap Hari</option>
                            <option value="hari_pilihan">Hari Pilihan</option>
                        </select>
                        <div id="pilihan-hari-container" style="display: none;">
                        <label class="form-label">Pilih Hari</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hari_pilihan[]" value="Senin" id="senin">
                            <label class="form-check-label" for="senin">Senin</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hari_pilihan[]" value="Selasa" id="selasa">
                            <label class="form-check-label" for="selasa">Selasa</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hari_pilihan[]" value="Rabu" id="rabu">
                            <label class="form-check-label" for="rabu">Rabu</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hari_pilihan[]" value="Kamis" id="kamis">
                            <label class="form-check-label" for="kamis">Kamis</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hari_pilihan[]" value="Jumat" id="jumat">
                            <label class="form-check-label" for="jumat">Jumat</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hari_pilihan[]" value="Sabtu" id="sabtu">
                            <label class="form-check-label" for="sabtu">Sabtu</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hari_pilihan[]" value="Minggu" id="minggu">
                            <label class="form-check-label" for="minggu">Minggu</label>
                        </div>
                    </div>
                    </div>
                    <div class="mb-3 jam-minum">
                        <label for="jam-minum" class="form-label">Jam Minum</label>
                        <input type="time" class="form-control" name="jam_minum[]" value="{{ implode(', ', $obat->jam_minum) }}" required>
                        <button type="button" class="btn btn-sm btn-danger hapus-jam">Hapus</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary tambah-jam">Tambah Jam Minum</button>
                    <div class="mb-3">
                        <label for="aturan-minum" class="form-label">Aturan Minum</label>
                        <select class="form-control" id="aturan-minum" name="aturan_minum" value="{{ str_replace('_', ' ', $obat->aturan_minum) }}" required>
                            <option value="sebelum_tidur">Sebelum Tidur</option>
                            <option value="sesudah_tidur">Sesudah Tidur</option>
                            <option value="sebelum_makan">Sebelum Makan</option>
                            <option value="sesudah_makan">Sesudah Makan</option>
                            <option value="saat_makan">Saat Makan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal-mulai" class="form-label">Tanggal Mulai Minum</label>
                        <input type="date" class="form-control" id="tanggal-mulai" name="tanggal_mulai" value="{{ $obat->tanggal_mulai }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="lama-konsumsi" class="form-label">Lama Konsumsi</label>
                        <div class="row">
                            <div class="col">
                                <select class="form-select" id="lama-konsumsi" name="lama_konsumsi" value="{{ $obat->lama_konsumsi }} {{ $obat->satuan_konsumsi }}" required>
                                    @for ($i = 1; $i <= 31; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select" name="satuan_konsumsi" required>
                                    <option value="hari">Hari</option>
                                    <option value="minggu">Minggu</option>
                                    <option value="bulan">Bulan</option>
                                    <option value="tahun">Tahun</option>
                                    <option value="seumur_hidup">Seumur Hidup</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan (Optional)</label>
                        <input type="text" class="form-control" id="catatan" name="catatan" value="{{ $obat->catatan }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const periodeSelect = document.getElementById('periode');
        const pilihanHariContainer = document.getElementById('pilihan-hari-container');

        // Function to toggle the display of the pilihan-hari-container
        function toggleHariPilihan() {
            if (periodeSelect.value === 'hari_pilihan') {
                pilihanHariContainer.style.display = 'block';
            } else {
                pilihanHariContainer.style.display = 'none';
            }
        }

        // Attach event listener to the select element
        periodeSelect.addEventListener('change', toggleHariPilihan);

        // Initialize display based on current value
        toggleHariPilihan();

        // Tambah jam minum
        const tambahJamBtn = document.querySelector('.tambah-jam');
        tambahJamBtn.addEventListener('click', function() {
            const jamMinumContainer = document.getElementById('jam-minum-container');
            const jamMinumDiv = document.createElement('div');
            jamMinumDiv.classList.add('mb-3', 'jam-minum');
            jamMinumDiv.innerHTML = `
                <label for="jam-minum" class="form-label">Jam Minum</label>
                <input type="time" class="form-control" name="jam_minum[]" required>
                <button type="button" class="btn btn-sm btn-danger hapus-jam">Hapus</button>
            `;
            jamMinumContainer.appendChild(jamMinumDiv);
        });

        // Hapus jam minum
        const jamMinumContainer = document.getElementById('jam-minum-container');
        jamMinumContainer.addEventListener('click', function(event) {
            if (event.target.classList.contains('hapus-jam')) {
                event.target.parentElement.remove();
            }
        });
    });
</script>
@endsection
