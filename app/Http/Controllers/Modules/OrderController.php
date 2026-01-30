<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Drink;
use App\Models\DrinkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the user's orders.
     */
    public function index()
    {
        $orders = DrinkOrder::where('user_id', Auth::id())->with('drink')->get();
        return view('modules.orders.index', compact('orders'));
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'drink_id' => 'required|exists:drinks,id',
            'quantity' => 'required|integer|min:1',
        ]);

        DrinkOrder::create([
            'user_id' => Auth::id(),
            'drink_id' => $request->drink_id,
            'quantity' => $request->quantity,
            'status' => 'pending',
        ]);

        return redirect()->route('orders.index')->with('success', 'Order placed successfully.');
    }

    /**
     * Update the status of an order (for admins).
     */
    public function updateStatus(Request $request, DrinkOrder $order)
    {
        $request->validate([
            'status' => 'required|string|in:pending,completed,cancelled',
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Order status updated.');
    }

    /**
     * Admin view for all orders.
     */
    public function adminIndex()
    {
        $orders = DrinkOrder::with(['drink', 'user'])->latest()->get();
        return view('modules.orders.admin.index', compact('orders'));
    }
}
