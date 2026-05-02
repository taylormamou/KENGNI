<x-app-layout>
@push('styles')
    @vite('resources/css/adminstyle/styleordeindex.css')
@endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Toutes les Commandes</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Client</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                                <th class="px-6 py-3 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($orders as $order)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">#{{ $order->id }}</td>
                                <td class="px-6 py-4">{{ $order->user->name ?? 'Utilisateur supprimé' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $order->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-green-600">
                                    {{ number_format($order->total, 2) }} francs
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full
                                        @if($order->status == 'delivered') bg-green-100 text-green-700
                                        @elseif($order->status == 'shipped') bg-blue-100 text-blue-700
                                        @elseif($order->status == 'paid') bg-yellow-100 text-yellow-700
                                        @elseif($order->status == 'cancelled') bg-red-100 text-red-700
                                        @else bg-gray-100 text-gray-600 @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('admin.orders.show', $order) }}" 
                                       class="text-indigo-600 hover:text-indigo-900 font-medium">
                                        Voir détails →
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-6">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>