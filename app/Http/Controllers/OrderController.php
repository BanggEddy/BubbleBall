<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        if ($user) {
            $orders = $user->orders()->with('product')->get();
        } else {
            $orders = collect();
        }

        return view('users.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if (Auth::check()) {
            $userId = Auth::id();

            $product = Product::findOrFail($request->product_id);

            if ($request->quantity <= $product->quantity) {
                $order = new Order();
                $order->user_id = $userId;
                $order->product_id = $request->product_id;
                $order->quantity = $request->quantity;
                $order->save();

                $product->quantity -= $request->quantity;
                $product->save();

                return redirect()->back()->with('success', 'Commande passée avec succès.');
            } else {
                return redirect()->back()->with('error', 'La quantité commandée est supérieure à la quantité disponible.');
            }
        } else {
            return redirect('/login')->with('error', 'Vous devez être connecté pour passer une commande.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $product = $order->product;

        $product->quantity += $order->quantity;
        $product->save();

        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Commande supprimée avec succès.');
    }
}
