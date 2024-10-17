<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plan = Schedule::all();
        $days_id = $plan->pluck('days')->unique();
        return view('schedule.index', compact('plan', 'days_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('schedule.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'days' => 'required|min:1',
            'time' => 'required|date_format:H:i',
            'description' => 'required|max:255',
        ],
        [
            'title.required' => 'title Harus Diisi',
            'days.required' => 'days Harus Diisi',
            'time.required' => 'time Harus Diisi',
            'description.required' => 'description Harus Diisi',
        ]);

        Schedule::create([
            'title' => $request->title,
            'days' => $request->days,
            'time' => $request->time,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Schedule has been added to the table');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        //
        $plan = Schedule::where('id', $id)->first();
        return view('schedule.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'title' => 'required',
            'days' => 'required',
            'time' => 'required',
            'description' => 'required',
        ]);

        Schedule::where('id', $id)->update([
                'title' => $request->title,
                'days' => $request->days,
                'time' => $request->time,
                'description' => $request->description,
        ]);
        return redirect()->route('planner.table')->with('success', 'Schedule has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $schedule)
    {
        $schedule = Schedule::where('id', $schedule)->delete();
        if($schedule){
            return redirect()->back()->with('success', 'Schedule Has Been Deleted');
        }else {
            return redirect()->back()->with('error', 'Schedule Failed To Be Deleted');
        }
    }
}
