<?php

namespace App\Http\Controllers;

use App\Models\Money;
use Illuminate\Http\Request;

class MoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $money = Money::all();
        return view('money.index', compact('money'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('money.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'from' => 'required|max:100',
            'to' => 'required|max:500',
            'total' => 'required|min:2',
            'date' => 'required|date_format:Y-m-d',
        ],
        [
            'from.required' => 'Title Harus Diisi',
            'to.required' => 'Description Harus Diisi',
            'total.required' => 'Total Harus Diisi',
            'date.required' => 'Date Harus Diisi',
        ]);

        Money::create([
            'from' => $request->from,
            'to' => $request->to,
            'total' => $request->total,
            'date' => $request->date,
        ]);

        return redirect()->back()->with('success', 'Daily Spend has been added to the table');
    }

    /**
     * Display the specified resource.
     */
    public function show(Money $money)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $money = Money::where('id', $id)->first();
        return view('money.edit', compact('money'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'total' => 'required',
            'date' => 'required',
        ]);

        Money::where('id', $id)->update([
                'from' => $request->from,
                'to' => $request->to,
                'total' => $request->total,
                'date' => $request->date,
        ]);
        return redirect()->route('spend.money')->with('success', 'Spending has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $money)
    {
        $money = Money::where('id', $money)->delete();
        if($money){
            return redirect()->back()->with('success', 'money Has Been Deleted');
        }else {
            return redirect()->back()->with('error', 'money Failed To Be Deleted');
        }
    }
}
