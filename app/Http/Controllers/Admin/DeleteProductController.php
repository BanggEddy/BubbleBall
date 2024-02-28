<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\HistoryAdmin;

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

        if (File::exists(public_path('images/' . $product->image))) {
            File::delete(public_path('images/' . $product->image));
        }

        HistoryAdmin::create([
            'action' => 'Suppression de produit',
            'product_id' => $product->id,
        ]);

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé avec succès.');
    }
}
