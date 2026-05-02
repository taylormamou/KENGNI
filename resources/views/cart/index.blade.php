<x-app-layout>
    
@push('styles')
    @vite('resources/css/cart.css')
@endpush

<x-slot name="header">
    <div class="page-header">
        <h1>🛒 Mon Panier</h1>
    </div>
</x-slot>

<div class="container">
    @if(session('success'))
        <div class="alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if(empty($cart))
        <div class="empty-cart">
            <span>🛒</span>
            <p>Votre panier est vide pour le moment...</p>
            <a href="{{ route('products.index') }}" class="btn-continue">
                🛍️ Continuer mes achats
            </a>
        </div>
    @else
        <div class="cart-card">
            <div class="cart-body">
                <table>
                    <thead>
                        <tr>
                            <th style="text-align:left">Produit</th>
                            <th>Prix unitaire</th>
                            <th>Quantité</th>
                            <th style="text-align:right">Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $id => $item)
                        <tr>
                            <td>
                                <div class="product-info">
                                    @if($item['image'])
                                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}">
                                    @else
                                        <div class="no-img">🛍️</div>
                                    @endif
                                    <span class="product-name">{{ $item['name'] }}</span>
                                </div>
                            </td>
                            <td class="price-cell">
                                {{ number_format($item['price'], 2) }} FCFA
                            </td>
                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="qty-form">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" 
                                           name="quantity" 
                                           value="{{ $item['quantity'] }}" 
                                           min="1"
                                           class="qty-input"
                                           onchange="this.form.submit()">
                                    <button type="submit" class="btn-update">✓</button>
                                </form>
                            </td>
                            <td class="line-total">
                                {{ number_format($item['price'] * $item['quantity'], 2) }} FCFA
                            </td>
                            <td style="text-align:right">
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-remove" title="Supprimer">🗑️</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="cart-footer">
                <div class="total-section">
                    <div class="total-label">Total de votre commande</div>
                    <div class="total-amount">{{ number_format($total, 2) }} FCFA</div>
                </div>
                <a href="{{ route('checkout') }}" class="btn-order">✅ Passer la commande</a>
            </div>
        </div>
    @endif
</div>
</x-app-layout>