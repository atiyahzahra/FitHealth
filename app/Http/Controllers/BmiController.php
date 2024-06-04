<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BodyMassIndex;

class BmiController extends Controller
{
    public function index()
    {
        return view('content.layouts-example.layouts-without-menu');
    }

    public function calculate(Request $request)
    {
        // Validasi input
        $request->validate([
            'height' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
        ]);

        // Ambil data dari request
        $height = $request->input('height');
        $weight = $request->input('weight');

        // Hitung BMI
        $bmi = $weight / (($height / 100) * ($height / 100));

        // Tentukan status BMI
        if ($bmi < 18.5) {
            $status = "Underweight";
        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
            $status = "Normal weight";
        } elseif ($bmi >= 25 && $bmi <= 29.9) {
            $status = "Overweight";
        } else {
            $status = "Obese";
        }

        // Simpan data ke database
        $bmiRecord = new BodyMassIndex();
        $bmiRecord->height = $height;
        $bmiRecord->weight = $weight;
        $bmiRecord->bmi = $bmi;
        $bmiRecord->status = $status;
        $bmiRecord->save();

        // Kembalikan respons JSON
        return response()->json([
            'bmi' => $bmi,
            'status' => $status
        ]);
    }
}
