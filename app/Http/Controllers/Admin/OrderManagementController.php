<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderManagementController extends Controller
{
    /**
     * Liste de toutes les commandes
     */
    public function index()
    {
        $orders = Order::with('user', 'items.product')
                        ->latest()
                        ->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Détail d'une commande
     */
    public function show(Order $order)
    {
        $order->load('user', 'items.product');
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Changer le statut d'une commande
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,shipped,delivered,cancelled'
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.orders.show', $order)
                         ->with('success', 'Statut de la commande mis à jour avec succès !');
    }
}