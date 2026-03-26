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
        padding: 2rem 2.5rem;
    }

    .page-header h1 {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: #3d1f00;
    }

    .page-header p { 
        color: #b07840; 
        font-size: 0.88rem; 
        margin-top: 0.3rem; 
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2.5rem 1.5rem;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
    }

    .product-card {
        background: #fffaf4;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid rgba(230, 160, 80, 0.2);
        box-shadow: 0 4px 20px rgba(200, 120, 40, 0.08);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 36px rgba(200, 120, 40, 0.16);
    }

    .product-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .product-img-placeholder {
        width: 100%;
        height: 200px;
        background: linear-gradient(135deg, #fde8cc, #fcd5a8);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
    }

    .product-body { padding: 1.2rem; }

    .product-name {
        font-family: 'Playfair Display', serif;
        font-size: 1.1rem;
        color: #3d1f00;
        margin-bottom: 0.4rem;
    }

    .product-desc {
        font-size: 0.82rem;
        color: #8a5c2e;
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 1rem;
    }

    .product-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .product-price {
        font-size: 1.25rem;
        font-weight: 700;
        color: #c05c10;
    }

    .btn-add {
        background: linear-gradient(135deg, #e8903a, #d4691e);
        color: #fff;
        padding: 0.65rem 1.2rem;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 500;
        border: none;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(212, 105, 30, 0.3);
    }
</style>

<x-slot name="header">
    <div class="page-header">
        <h1>🛒 Catalogue Produits</h1>
        <p>Découvrez notre sélection du moment ✨</p>
    </div>
</x-slot>

<div class="container">
        @if(session('success'))
        <div style="
            background: #d1fae5;
            color: #065f46;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 500;
        ">
            {{ session('success') }}
        </div>
    @endif
    @if($products->isEmpty())
        <div class="empty">
            <span>📦</span>
            Aucun produit disponible pour le moment.
        </div>
    @else
        <div class="grid">
            @foreach($products as $product)
                <div class="product-card">
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-img">
                    @else
                        <div class="product-img-placeholder">🛍️</div>
                    @endif

                    <div class="product-body">
                        <div class="product-name">{{ $product->name }}</div>
                        <div class="product-desc">{{ $product->description }}</div>
                        
                        <div class="product-footer">
                            <span class="product-price">{{ number_format($product->price, 2) }} FCFA</span>
                            
                            <form action="{{ route('cart.add', $product) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-add">
                                    🛒 Ajouter
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
</x-app-layout>