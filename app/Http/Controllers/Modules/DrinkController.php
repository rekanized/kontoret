<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource for both users and admins.
     */
    public function index()
    {
        $drinks = Drink::all();
        return view('modules.drinks.index', compact('drinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.drinks.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_available' => 'boolean',
        ]);

        Drink::create($request->all());

        return redirect()->route('drinks.admin.index')->with('success', 'Drink created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Drink $drink)
    {
        return view('modules.drinks.show', compact('drink'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drink $drink)
    {
        return view('modules.drinks.admin.edit', compact('drink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drink $drink)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'is_available' => 'boolean',
        ]);

        $drink->update($request->all());

        return redirect()->route('drinks.admin.index')->with('success', 'Drink updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drink $drink)
    {
        $drink->delete();
        return redirect()->route('drinks.admin.index')->with('success', 'Drink deleted successfully.');
    }

    /**
     * Admin specific index view.
     */
    public function adminIndex()
    {
        $drinks = Drink::all();
        return view('modules.drinks.admin.index', compact('drinks'));
    }
}
