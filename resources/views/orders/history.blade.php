<x-app-layout>
@push('styles')
    @vite('resources/css/history.css')
@endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">📋 Mes Commandes</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            @if($orders->isEmpty())
                <div class="empty-orders">
                    <span class="empty-icon">📦</span>
                    <p>Vous n'avez pas encore passé de commande.</p>
                    <a href="{{ route('products.index') }}">🛍️ Découvrir nos produits</a>
                </div>
            @else
                @foreach($orders as $order)
                <div class="order-card">
                    <div class="order-card-top">
                        <div>
                            <div class="order-id">Commande #{{ $order->id }}</div>
                            <div class="order-date">{{ $order->created_at->format('d/m/Y à H:i') }}</div>
                        </div>
                        <span class="badge
                            @if($order->status == 'delivered') badge-delivered
                            @elseif($order->status == 'shipped') badge-shipped
                            @elseif($order->status == 'paid') badge-paid
                            @else badge-pending @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <div class="order-card-bottom">
                        <div>
                            <div class="order-articles">{{ $order->items->count() }} article(s)</div>
                            <div class="order-total">{{ number_format($order->total, 2) }} FCFA</div>
                        </div>
                        <a href="{{ route('orders.show', $order) }}" class="btn-detail">
                            Voir détails →
                        </a>
                    </div>
                </div>
                @endforeach

                <div class="mt-8">
                    {{ $orders->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>