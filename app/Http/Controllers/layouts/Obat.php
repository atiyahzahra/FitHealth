<?php

namespace App\Http\Controllers\Layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obat as ObatModel;



class Obat extends Controller
{
    public function index()
{
    $obats = ObatModel::all();
    return view('content.obat.index', compact('obats'));
}

    public function create()
    {
        return view('content.obat.create');
    }

    public function store(Request $request)
    {

        // Validate form data
        $validatedData = $request->validate([
            'nama_obat' => 'required|string|max:255',
            'dosis' => 'required|string|max:255',
            'satuan' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'jam_minum' => 'required|array',
            'jam_minum.*' => 'required|date_format:H:i',
            'aturan_minum' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'lama_konsumsi' => 'required|numeric',
            'satuan_konsumsi' => 'required|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        // Ambil nilai periode dari form
        $periode = $validatedData['periode'];

        // Jika periode adalah "Hari Pilihan", ambil hari yang dipilih dari form
        if ($periode === 'hari_pilihan') {
            $selectedDays = $request->input('hari_pilihan');
            // Ubah nilai periode menjadi string yang berisi daftar hari yang dipilih
            $validatedData['periode'] = implode(', ', $selectedDays);
        }

        // Buat instansi baru dari model Obat
        $obat = new ObatModel();
        // Isi model dengan data yang telah divalidasi
        $obat->fill($validatedData);
        // Simpan model ke dalam database
        $obat->save();


        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('content.obat.index')->with('success', 'Obat berhasil ditambahkan.');

    }

    public function edit($id)
    {
        $obat = ObatModel::findOrFail($id);
        return view('content.obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        // Validate form data
        $validatedData = $request->validate([
            'nama_obat' => 'required|string|max:255',
            'dosis' => 'required|string|max:255',
            'satuan' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'jam_minum' => 'required|array',
            'jam_minum.*' => 'required|date_format:H:i',
            'aturan_minum' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'lama_konsumsi' => 'required|numeric',
            'satuan_konsumsi' => 'required|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        // Update the Obat record in the database
        $obat = ObatModel::findOrFail($id);
        $obat->update($validatedData);


        // Redirect to the index page after successful update
        return redirect()->route('content.obat.index')->with('success', 'Detail obat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $obat = ObatModel::findOrFail($id);
        $obat->delete();
        return redirect()->route('content.obat.index')->with('success', 'Obat berhasil dihapus.');
    }
}
