<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\HistoryAdmin;
use Illuminate\Support\Facades\Auth;

class AddProductController extends Controller
{
    public function create()
    {
        return view('admin.add.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'required|image|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->type = $request->type;
        $product->prix = $request->prix;
        $product->quantity = $request->quantity;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        HistoryAdmin::create([
            'action' => 'Ajout de produit',
            'product_id' => $product->id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produit ajouté avec succès.');
    }
}
