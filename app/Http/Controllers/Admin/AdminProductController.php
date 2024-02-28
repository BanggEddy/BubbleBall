<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\HistoryAdmin;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function addQuantity(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity');
        $product->quantity += $quantity;
        $product->save();

        HistoryAdmin::create([
            'action' => 'add_quantity',
            'quantity' => $quantity,
            'product_id' => $product->id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Quantité ajoutée avec succès.');
    }

    public function removeQuantity(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity');
        $product->quantity -= $quantity;
        $product->save();

        HistoryAdmin::create([
            'action' => 'remove_quantity',
            'quantity' => $quantity,
            'product_id' => $product->id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Quantité retirée avec succès.');
    }
}
