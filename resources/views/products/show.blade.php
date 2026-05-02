<x-app-layout>
@push('styles')
    @vite('resources/css/show.css')
@endpush


<x-slot name="header">
    <div class="page-header">
        <h1>🛍️ {{ $product->name }}</h1>
    </div>
</x-slot>

<div class="container">
    <a href="{{ route('products.index') }}" class="back-link">← Retour au catalogue</a>

    <div class="card">
        <div class="card-img">
            @if($product->image)
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
            @else
                <div class="card-img-placeholder">🛍️</div>
            @endif
        </div>

        <div class="card-body">
            <div>
                <h1 class="product-name">{{ $product->name }}</h1>
                <div class="product-price">{{ number_format($product->price, 2) }} FCFA</div>
                <p class="product-desc">{{ $product->description }}</p>

                @if($product->stock > 0)
                    <span class="stock-badge stock-ok">✅ {{ $product->stock }} en stock</span>
                @else
                    <span class="stock-badge stock-empty">❌ Rupture de stock</span>
                @endif
            </div>

            @if($product->stock > 0)
                <form action="{{ route('cart.add', $product) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-cart">
                        🛒 Ajouter au panier
                    </button>
                </form>
            @else
                <button class="btn-cart" disabled>😔 Indisponible pour le moment</button>
            @endif
        </div>
    </div>
</div>
</x-app-layout>