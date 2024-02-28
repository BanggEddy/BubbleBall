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
    public function destroy(Product $product)
    {
        $product->delete();

        HistoryAdmin::create([
            'action' => 'delete_product',
            'product_id' => $product->id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé avec succès.');
    }
    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'prix' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $product = new Product([
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'prix' => $request->get('prix'),
            'quantity' => $request->get('quantity'),
            'image' => $imageName
        ]);
        $product->save();

        HistoryAdmin::create([
            'action' => 'add_product',
            'product_id' => $product->id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produit ajouté avec succès.');
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
            'action' => 'Ajout de quantité',
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
            'action' => 'Suppression de quantité',
            'quantity' => $quantity,
            'product_id' => $product->id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Quantité retirée avec succès.');
    }
}
