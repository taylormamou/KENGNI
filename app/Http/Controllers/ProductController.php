<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Afficher la liste de tous les produits (Catalogue)
     */
    public function index(): View
    {
        $products = Product::all();   // On récupère tous les produits

        return view('products.index', compact('products'));
    }

    /**
     * Afficher les détails d'un seul produit
     */
    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    
}