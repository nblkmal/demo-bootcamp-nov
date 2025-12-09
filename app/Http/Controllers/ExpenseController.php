<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'expenses' => Expense::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|integer',
            'category' => 'required',
            'notes' => 'required',
        ]);

        Expense::create([
            'title' => $request->title, //'Lunch'
            'description' => $request->description, //'Makan di office'
            'amount' => $request->amount, //12.50,
            'category' => $request->category, //'Food'
            'notes' => $request->notes, //'Nasi lemak + drink'
        ]);

        // ini reason endpoint return as 302 Found
        return redirect()->route('dashboard');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()->route('dashboard');
    }

    public function edit(Expense $expense)
    {
        return view('expenses.edit', [
            'expense' => $expense
        ]);
    }

    public function update(Request $request, Expense $expense)
    {
        // validate request first
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|integer',
            'category' => 'required',
            'notes' => 'required',
        ]);
        $expense->update([
            'title' => $request->title, //'Lunch'
            'description' => $request->description, //'Makan di office'
            'amount' => $request->amount, //12.50,
            'category' => $request->category, //'Food'
            'notes' => $request->notes, //'Nasi lemak + drink'
        ]);

        return redirect()->back();
    }
}
