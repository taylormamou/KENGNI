<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class OrderHistoryController extends Controller
{
    public function index(): View
    {
        $orders = Order::where('user_id', Auth::id())
                       ->with('items.product')
                       ->latest()
                       ->paginate(10);

        return view('orders.history', compact('orders'));
    }

    public function show(Order $order): View
    {
        // Sécurité : l'utilisateur ne peut voir que ses propres commandes
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Accès refusé.');
        }

        $order->load('items.product');
        return view('orders.show', compact('order'));
    }
}