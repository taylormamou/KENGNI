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
    }

    .container {
        max-width: 1000px;
        margin: 2.5rem auto;
        padding: 0 1.5rem;
    }

    .summary-card {
        background: #fffaf4;
        border: 1px solid rgba(230,160,80,0.25);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 10px 45px rgba(200,120,40,0.12);
    }

    .summary-header {
        background: linear-gradient(135deg, #f5e4c8, #f0d5a8);
        padding: 1.5rem 2rem;
        border-bottom: 1px solid #e8c99a;
    }

    .summary-body {
        padding: 2rem;
    }

    .item-row {
        display: flex;
        justify-content: space-between;
        padding: 1rem 0;
        border-bottom: 1px dashed #f0d5a8;
    }

    .item-row:last-child {
        border-bottom: none;
    }

    .item-name {
        font-weight: 500;
        color: #3d1f00;
    }

    .item-total {
        font-weight: 600;
        color: #c05c10;
    }

    .total-section {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 3px solid #f0d5a8;
    }

    .grand-total {
        font-family: 'Playfair Display', serif;
        font-size: 2.4rem;
        font-weight: 700;
        color: #c05c10;
        text-align: right;
    }

    .btn-confirm {
        width: 100%;
        background: linear-gradient(135deg, #e8903a, #d4691e);
        color: white;
        padding: 1.2rem;
        border: none;
        border-radius: 14px;
        font-size: 1.1rem;
        font-weight: 600;
        margin-top: 2rem;
        box-shadow: 0 8px 25px rgba(212,105,30,0.4);
        transition: all 0.25s ease;
    }

    .btn-confirm:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 35px rgba(212,105,30,0.5);
    }

    .info-box {
        background: #fefce8;
        border: 1px solid #facc15;
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin: 2rem 0;
        font-size: 0.9rem;
        color: #854d0e;
    }
</style>

<x-slot name="header">
    <div class="page-header">
        <h1>✅ Finaliser ma commande</h1>
    </div>
</x-slot>

<div class="container">
    
    <div class="summary-card">
        <div class="summary-header">
            <h2 class="text-xl font-semibold text-[#3d1f00]">Récapitulatif de votre commande</h2>
        </div>

        <div class="summary-body">
            @foreach($cart as $id => $item)
                <div class="item-row">
                    <div>
                        <div class="item-name">{{ $item['name'] }}</div>
                        <div class="text-sm text-gray-600">
                            Quantité : {{ $item['quantity'] }} × {{ number_format($item['price'], 2) }} FCFA
                        </div>
                    </div>
                    <div class="item-total">
                        {{ number_format($item['price'] * $item['quantity'], 2) }} FCFA
                    </div>
                </div>
            @endforeach

            <div class="total-section">
                <div class="flex justify-between items-baseline">
                    <span class="text-lg font-medium text-[#3d1f00]">Total à payer</span>
                    <span class="grand-total">{{ number_format($total, 2) }} FCFA</span>
                </div>
            </div>

            <div class="info-box">
                <strong>Informations importantes :</strong><br>
                • Paiement fictif (démo)<br>
                • Le stock sera mis à jour après validation<br>
                • Vous recevrez un email de confirmation (simulation)
            </div>

            <!-- Formulaire de validation de commande -->
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <button type="submit" class="btn-confirm">
                    💳 Confirmer et payer {{ number_format($total, 2) }} FCFA
                </button>
            </form>
        </div>
    </div>

    <div class="text-center mt-8">
        <a href="{{ route('cart.index') }}" class="text-[#b07840] hover:underline">
            ← Retour au panier
        </a>
    </div>
</div>
</x-app-layout>