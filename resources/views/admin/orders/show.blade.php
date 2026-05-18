<x-app-layout>
@push('styles')
    @vite('resources/css/adminstyle/styleordershow.css')
@endpush
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Commande #{{ $order->id }}
            </h2>
            <a href="{{ route('admin.orders.index') }}" class="text-gray-500 hover:text-gray-700">
                ← Retour à la liste
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Informations Client & Commande -->
                <div class="lg:col-span-1">
                    <div class="bg-white shadow-sm rounded-2xl p-6 mb-6">
                        <h3 class="font-semibold text-lg mb-4">Informations Client</h3>
                        <p><strong>Nom :</strong> {{ $order->user->name }}</p>
                        <p><strong>Email :</strong> {{ $order->user->email }}</p>
                        <p><strong>Date :</strong> {{ $order->created_at->format('d/m/Y à H:i') }}</p>
                    </div>

                    <div class="bg-white shadow-sm rounded-2xl p-6">
                        <h3 class="font-semibold text-lg mb-4">Statut de la commande</h3>
                        
                        <form action="{{ route('admin.orders.status', $order) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            
                            <select name="status" class="w-full border border-gray-300 rounded-xl px-4 py-3 mb-4">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>En attente</option>
                                <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Payée</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Expédiée</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Livrée</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Annulée</option>
                            </select>
                            
                            <button type="submit" 
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-xl font-medium">
                                Mettre à jour le statut
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Détails des produits commandés -->
                <div class="lg:col-span-2">
                    <div class="bg-white shadow-sm rounded-2xl p-6">
                        <h3 class="font-semibold text-lg mb-6">Produits commandés</h3>
                        
                        <div class="space-y-6">
                            @foreach($order->items as $item)
                            <div class="flex gap-6 border-b pb-6 last:border-b-0 last:pb-0">
                                <div class="w-20 h-20 bg-gray-100 rounded-xl flex-shrink-0 overflow-hidden">
                                    @if($item->product->image)
                                        <img src="{{ asset($item->product->image)}}" 
                                             alt="{{ $item->product->name }}" 
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-3xl">📦</div>
                                    @endif
                                </div>
                                
                                <div class="flex-1">
                                    <h4 class="font-medium">{{ $item->product->name }}</h4>
                                    <p class="text-sm text-gray-500">Quantité : {{ $item->quantity }}</p>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Prix unitaire : {{ number_format($item->price, 2) }} francs
                                    </p>
                                </div>
                                
                                <div class="text-right font-semibold">
                                    {{ number_format($item->price * $item->quantity, 2) }} francs
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-8 pt-6 border-t flex justify-between items-center text-xl">
                            <span class="font-semibold">Total de la commande</span>
                            <span class="font-bold text-green-600">{{ number_format($order->total, 2) }} francs</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>