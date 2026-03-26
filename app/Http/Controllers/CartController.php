<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    // Ajouter au panier avec vérification de stock
    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        $quantityInCart = $cart[$product->id]['quantity'] ?? 0;
        $newQuantity = $quantityInCart + 1;

        // Vérification du stock
        if ($newQuantity > $product->stock) {
            return redirect()->route('cart.index')
                             ->with('error', "Désolé, il ne reste que {$product->stock} exemplaire(s) de {$product->name} en stock.");
        }

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += 1;
        } else {
            $cart[$product->id] = [
                'name'     => $product->name,
                'price'    => $product->price,
                'quantity' => 1,
                'image'    => $product->image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')
                         ->with('success', "{$product->name} a été ajouté au panier !");
    }

    public function update(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);
        $quantity = (int) $request->quantity;

        if ($quantity < 1) {
            return $this->remove($product);
        }

        // Vérification du stock
        if ($quantity > $product->stock) {
            return redirect()->route('cart.index')
                             ->with('error', "Stock insuffisant pour {$product->name}. Maximum : {$product->stock}");
        }

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $quantity;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')
                         ->with('success', 'Panier mis à jour');
    }

    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')
                         ->with('success', 'Produit supprimé du panier');
    }
}