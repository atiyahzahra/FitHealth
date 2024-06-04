<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaterIntake;

class WaterIntakeController extends Controller
{
    public function show()
    {
        $target = WaterIntake::first(); // Without auth, just get the first record
        return view('content.layouts-example.layouts-without-navbar', compact('target'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'target' => 'required|integer|min:1',
        ]);

        $target = WaterIntake::updateOrCreate(
            ['id' => 1], // Assuming single record with ID 1
            ['target' => $request->target]
        );

        return redirect()->route('water_intake_target.show')->with('success', 'Target updated successfully');
    }

    public function updateConsumed(Request $request)
    {
        $request->validate([
            'consumed' => 'required|integer|min:0',
        ]);

        $target = WaterIntake::firstOrFail(); // Get the first record
        $target->update([
            'consumed' => $target->consumed + $request->consumed
        ]);

        if ($target->consumed > $target->target) {
            session()->flash('warning', 'Warning: You have exceeded your water intake target!');
        } elseif ($target->consumed === $target->target) {
            session()->flash('success', 'Congratulations! You have reached your water intake target.');
        }


        return redirect()->route('water_intake_target.show')->with('success', 'Water intake updated successfully');
    }

    public function resetConsumed()
    {
        $target = WaterIntake::firstOrFail(); // Get the first record
        $target->update([
            'consumed' => 0
        ]);

        return redirect()->route('water_intake_target.show')->with('success', 'Water intake reset successfully');
    }
}






// class WaterIntakeTargetController extends Controller
// {
//     public function show()
//     {
//         $target = WaterIntake::where('user_id', Auth::id())->first();
//         return view('water_intake_target.show', compact('target'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'target_amount' => 'required|integer|min:1',
//         ]);

//         $target = WaterIntake::updateOrCreate(
//             ['user_id' => Auth::id()],
//             ['target_amount' => $request->target_amount]
//         );

//         return redirect()->route('water_intake_target.show')->with('success', 'Target updated successfully');
//     }

//     public function updateConsumed(Request $request)
//     {
//         $request->validate([
//             'consumed' => 'required|integer|min:0',
//         ]);

//         $target = WaterIntake::where('user_id', Auth::id())->firstOrFail();
//         $target->update([
//             'consumed' => $target->consumed + $request->consumed
//         ]);

//         return redirect()->route('water_intake_target.show')->with('success', 'Water intake updated successfully');
//     }

//     public function resetConsumed()
//     {
//         $target = WaterIntake::where('user_id', Auth::id())->firstOrFail();
//         $target->update([
//             'consumed' => 0
//         ]);

//         return redirect()->route('water_intake_target.show')->with('success', 'Water intake reset successfully');
//     }
// }
?>
