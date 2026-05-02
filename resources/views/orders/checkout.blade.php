<x-app-layout>
@push('styles')
    @vite('resources/css/checkout.css')
@endpush

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