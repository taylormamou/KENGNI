<x-app-layout>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@300;400;500;600&display=swap');

    body {
        font-family: 'Inter', system-ui, sans-serif;
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
        font-size: 2.1rem;
        font-weight: 700;
        color: #3d1f00;
        margin: 0;
    }

    .container {
        max-width: 1100px;
        margin: 2.5rem auto;
        padding: 0 1.5rem;
    }

    .alert-success {
        background: #fef3e2;
        border: 1px solid #f0c87a;
        color: #a05c10;
        border-radius: 12px;
        padding: 1rem 1.4rem;
        font-size: 0.95rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Panier vide */
    .empty-cart {
        background: #fffaf4;
        border: 1px solid rgba(230,160,80,0.25);
        border-radius: 24px;
        padding: 5rem 2rem;
        text-align: center;
        box-shadow: 0 10px 40px rgba(200,120,40,0.1);
    }

    .empty-cart span {
        font-size: 5rem;
        display: block;
        margin-bottom: 1.2rem;
    }

    .empty-cart p {
        font-size: 1.15rem;
        color: #8a5c2e;
        margin-bottom: 2rem;
    }

    .btn-continue {
        background: linear-gradient(135deg, #e8903a, #d4691e);
        color: white;
        padding: 0.95rem 2.2rem;
        border-radius: 14px;
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 8px 25px rgba(212, 105, 30, 0.35);
        transition: all 0.25s ease;
    }

    .btn-continue:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(212, 105, 30, 0.45);
    }

    /* Carte du panier */
    .cart-card {
        background: #fffaf4;
        border: 1px solid rgba(230,160,80,0.25);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 10px 45px rgba(200,120,40,0.12);
    }

    .cart-body {
        padding: 2rem;
    }

    /* Tableau */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead th {
        padding: 1rem 0.75rem;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: #b07840;
        text-align: left;
    }

    thead th:nth-child(2), thead th:nth-child(3) {
        text-align: center;
    }

    thead th:last-child {
        text-align: right;
    }

    tbody tr {
        border-bottom: 1px solid #f5e4c8;
    }

    tbody tr:last-child {
        border-bottom: none;
    }

    td {
        padding: 1.4rem 0.75rem;
        vertical-align: middle;
    }

    .product-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .product-info img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 12px;
        border: 2px solid #f5e4c8;
    }

    .product-info .no-img {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #fde8cc, #fcd5a8);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        border: 2px solid #f5e4c8;
    }

    .product-name {
        font-family: 'Playfair Display', serif;
        font-size: 1.1rem;
        font-weight: 600;
        color: #3d1f00;
        line-height: 1.3;
    }

    .price-cell {
        text-align: center;
        font-size: 1.05rem;
        font-weight: 500;
        color: #7a4e28;
    }

    .qty-form {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .qty-input {
        width: 72px;
        text-align: center;
        border: 2px solid #e8c99a;
        border-radius: 10px;
        padding: 0.55rem 0.4rem;
        font-size: 1rem;
        background: white;
        color: #3d1f00;
    }

    .qty-input:focus {
        border-color: #d4872a;
        outline: none;
    }

    .btn-update {
        background: #f5e4c8;
        border: none;
        border-radius: 8px;
        padding: 0.55rem 0.8rem;
        font-size: 0.85rem;
        color: #8a5c2e;
        cursor: pointer;
    }

    .btn-remove {
        background: none;
        border: none;
        color: #d08060;
        font-size: 1.35rem;
        cursor: pointer;
        padding: 0.3rem;
    }

    .btn-remove:hover {
        color: #c0392b;
    }

    .line-total {
        text-align: right;
        font-weight: 600;
        font-size: 1.05rem;
        color: #c05c10;
    }

    /* Footer */
    .cart-footer {
        border-top: 2px solid #f0d5a8;
        padding: 2rem 2.5rem;
        background: linear-gradient(135deg, #fff7ee, #fef0dc);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1.5rem;
    }

    .total-section {
        text-align: left;
    }

    .total-label {
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.08em;
        color: #b07840;
        text-transform: uppercase;
    }

    .total-amount {
        font-family: 'Playfair Display', serif;
        font-size: 2.4rem;
        font-weight: 700;
        color: #c05c10;
        line-height: 1;
    }

    .btn-order {
        background: linear-gradient(135deg, #e8903a, #d4691e);
        color: white;
        padding: 1.1rem 2.8rem;
        border-radius: 14px;
        font-size: 1.05rem;
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 8px 25px rgba(212,105,30,0.4);
        transition: all 0.25s ease;
        white-space: nowrap;
    }

    .btn-order:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 35px rgba(212,105,30,0.5);
    }
</style>

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