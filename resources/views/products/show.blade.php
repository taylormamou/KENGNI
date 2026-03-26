<x-app-layout>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Inter:wght@300;400;500&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        background: #fdf6ec;
        color: #3d1f00;
    }

    .page-header {
        background: linear-gradient(135deg, #fff7ee, #fde8cc);
        border-bottom: 1px solid #f0d0a0;
        padding: 1.5rem 2.5rem;
    }

    .page-header h1 {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        color: #3d1f00;
    }

    .container {
        max-width: 900px;
        margin: 2.5rem auto;
        padding: 0 1.5rem;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        color: #b07840;
        font-size: 0.85rem;
        text-decoration: none;
        margin-bottom: 1.5rem;
        transition: color 0.2s;
    }

    .back-link:hover { color: #d4872a; }

    .card {
        background: #fffaf4;
        border-radius: 22px;
        overflow: hidden;
        border: 1px solid rgba(230, 160, 80, 0.2);
        box-shadow: 0 8px 40px rgba(200, 120, 40, 0.1);
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    @media (max-width: 640px) {
        .card { grid-template-columns: 1fr; }
    }

    .card-img img {
        width: 100%;
        height: 100%;
        min-height: 340px;
        object-fit: cover;
    }

    .card-img-placeholder {
        width: 100%;
        min-height: 340px;
        background: linear-gradient(135deg, #fde8cc, #fcd5a8);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 5rem;
    }

    .card-body {
        padding: 2.5rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .product-name {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        color: #3d1f00;
        line-height: 1.25;
        margin-bottom: 0.5rem;
    }

    .product-price {
        font-size: 2rem;
        font-weight: 700;
        color: #c05c10;
        margin-bottom: 1.5rem;
    }

    .product-desc {
        font-size: 0.9rem;
        color: #7a4e28;
        line-height: 1.7;
        margin-bottom: 1.5rem;
        flex: 1;
    }

    .stock-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.4rem 0.9rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        margin-bottom: 2rem;
    }

    .stock-ok {
        background: #fef3e2;
        color: #a05c10;
        border: 1px solid #f0c87a;
    }

    .stock-empty {
        background: #fde8e8;
        color: #c0392b;
        border: 1px solid #f0a0a0;
    }

    .btn-cart {
        display: block;
        width: 100%;
        background: linear-gradient(135deg, #e8903a, #d4691e);
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 1.1rem;
        font-size: 1.05rem;
        font-weight: 600;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s;
        box-shadow: 0 6px 20px rgba(212, 105, 30, 0.35);
    }

    .btn-cart:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 28px rgba(212, 105, 30, 0.45);
    }
</style>

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