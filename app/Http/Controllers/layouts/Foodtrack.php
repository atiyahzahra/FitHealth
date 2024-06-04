<?php

namespace App\Http\Controllers\Layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food as FoodModel;

class FoodTrack extends Controller
{
  public function store(Request $request)
  {
      $request->validate([
          'jenis_makanan' => 'required',
          'item_makanan' => 'required',
          'tanggal_makan' => 'required|date',
          'waktu_makan' => 'required|string', // Changed from required to required|string
      ]);

      FoodModel::create($request->all());

      return redirect()->route('content.foodtrack.index')->with('success', 'Food track saved successfully!');
  }


    public function index()
    {
        $foodTracks = FoodModel::all();

        return view('content.foodtrack.index', compact('foodTracks'));
    }
}
