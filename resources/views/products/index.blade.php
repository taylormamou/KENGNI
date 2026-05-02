<x-app-layout>
    
@push('styles')
    @vite('resources/css/index.css')
@endpush

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