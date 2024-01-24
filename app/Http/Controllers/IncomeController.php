<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.incomes.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'income_description' => 'required|max:255',
            'amount' => 'required',
            'category' => 'required',
            'date_of_income' => 'required|date'
        ]);
        $validatedData['user_id'] = auth()->user()->id;

        Income::create($validatedData);
        return view('dashboard.index')->with('success', 'A new has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        return view('dashboard.incomes.edit',[
            'income' => $income
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Income $income)
    {
        $rules = [
            'income_description' => 'required|max:255',
            'amount' => 'required',
            'category' => 'required',
            'date_of_income' => 'required|date'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Income::where('id', $income->id)
            ->update($validatedData);

        return redirect()->route('viewTables', ['username' => auth()->user()->username])->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        Income::destroy($income->id);
        return redirect()->route('viewTables', ['username' => auth()->user()->username])->with('success', 'Record deleted successfully!');
    }
}
