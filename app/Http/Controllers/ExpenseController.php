<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.expenses.create', [
            "active" => "add_expense"
        ]);
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
            'expense_description' => 'required|max:255',
            'amount' => 'required',
            'category' => 'required',
            'date_of_expense' => 'required|date'
        ]);
        $validatedData['user_id'] = auth()->user()->id;

        Expense::create($validatedData);
        return redirect()->route('viewTables', ['username' => auth()->user()->username])->with('success', 'Record added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        return view('dashboard.expenses.edit', [
            'expense' => $expense
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $rules = [
            'expense_description' => 'required|max:255',
            'amount' => 'required',
            'category' => 'required',
            'date_of_expense' => 'required|date'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Expense::where('id', $expense->id)
            ->update($validatedData);

        return redirect()->route('viewTables', ['username' => auth()->user()->username])->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        Expense::destroy($expense->id);
        return redirect()->route('viewTables', ['username' => auth()->user()->username])->with('success', 'Record deleted successfully!');
    }
}
