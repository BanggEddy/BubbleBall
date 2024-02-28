<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DeleteProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.delete.index', compact('products'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé avec succès.');
    }
}
