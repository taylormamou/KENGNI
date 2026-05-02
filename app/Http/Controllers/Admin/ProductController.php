<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price', 'stock']);

        // Gestion de l'upload d'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/products'), $filename);
            $data['image'] = 'images/products/' . $filename;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Produit ajouté avec succès !');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price', 'stock']);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/products'), $filename);
            $data['image'] = 'images/products/' . $filename;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Produit mis à jour avec succès !');
    }

        public function destroy(Product $product)
    {
        if ($product->image) {
            // Supprimer le fichier dans public/
            $fullPath = public_path($product->image);
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')
                        ->with('success', 'Produit supprimé avec succès !');
    }
}