<?php

namespace App\Http\Controllers\layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Fluid extends Controller
{

  public function index()
  {
    return view('content.layouts-example.layouts-fluid');
  }
  public function create()
    {
        return view('content.obat.create');
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
