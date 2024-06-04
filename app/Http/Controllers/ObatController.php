<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    public function create()
    {
        return view('obat.create');
    }

    public function store(Request $request)
    {
        // Validasi data form dan simpan ke database
    }

    public function edit($id)
    {
        // Ambil data pengingat obat berdasarkan ID dan tampilkan view edit
    }

    public function update(Request $request, $id)
    {
        // Validasi data form dan update data pengingat obat yang ada di database
    }

    public function show($id)
    {
        // Ambil data pengingat obat berdasarkan ID dan tampilkan view show
    }
}
