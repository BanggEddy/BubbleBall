<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\HistoryAdmin;

class AdminOrdersController extends Controller
{
    public function index()
    {
        $orders = Order::with('product', 'user')->get();

        return view('admin.orders.index', compact('orders'));
    }
    public function destroy(Order $order)
    {
        HistoryAdmin::create([
            'action' => 'Suppression de commande',
            'quantity' => $order->quantity,
            'product_id' => $order->product_id,
            'user_id' => $order->user_id,
        ]);

        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Commande supprimée avec succès.');
    }
}
