<x-app-layout>
@push('styles')
    @vite('resources/css/show1.css')
@endpush

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800">
                Commande #{{ $order->id }}
            </h2>
            <a href="{{ route('orders.history') }}" class="text-gray-500 hover:text-gray-700">
                ← Mes Commandes
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-2xl overflow-hidden">

                <!-- En-tête commande -->
                <div class="px-8 py-6 border-b bg-gray-50 flex justify-between items-center">
                    <div>
                        <p class="text-sm text-gray-500">Commande passée le</p>
                        <p class="font-medium">{{ $order->created_at->format('d F Y à H:i') }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500">Statut</p>
                        <span class="inline-flex px-4 py-2 text-sm font-semibold rounded-full
                            @if($order->status == 'delivered') bg-green-100 text-green-700
                            @elseif($order->status == 'shipped') bg-blue-100 text-blue-700
                            @elseif($order->status == 'paid') bg-yellow-100 text-yellow-700
                            @else bg-gray-100 text-gray-600 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>

                <!-- Produits -->
                <div class="p-8">
                    <h3 class="font-semibold text-lg mb-6">Articles commandés</h3>
                    
                    @foreach($order->items as $item)
                    <div class="flex gap-6 py-6 border-b last:border-b-0">
                        <div class="w-24 h-24 bg-gray-100 rounded-xl overflow-hidden flex-shrink-0">
                            @if($item->product->image)
                                <img src="{{ asset($item->product->image) }}"
                                     alt="{{ $item->product->name }}"
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-4xl">📦</div>
                            @endif
                        </div>
                        
                        <div class="flex-1">
                            <h4 class="font-medium text-lg">{{ $item->product->name }}</h4>
                            <p class="text-gray-600">Quantité : <strong>{{ $item->quantity }}</strong></p>
                            <p class="text-sm text-gray-500">Prix unitaire : {{ number_format($item->price, 2) }} francs cfa</p>
                        </div>
                        
                        <div class="text-right font-semibold text-lg">
                            {{ number_format($item->price * $item->quantity, 2) }} francs cfa
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Total -->
                <div class="bg-gray-50 px-8 py-6 flex justify-between items-center border-t">
                    <span class="text-xl font-semibold">Total payé</span>
                    <span class="text-3xl font-bold text-green-600">
                        {{ number_format($order->total, 2) }} francs cfa
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>