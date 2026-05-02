<x-app-layout>
    @push('styles')
    @vite('resources/css/adminstyle/styleproductindex.css')
@endpush
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">Gestion des Produits</h2>
            <a href="{{ route('admin.products.create') }}" 
               class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-xl font-medium">
                + Nouveau Produit
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Produit</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prix</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stock</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($products as $product)
                        <tr>
                            <td class="px-6 py-4">
                                @if($product->image)
                                    <img src="{{ asset($product->image)}}" alt="" class="w-16 h-16 object-cover rounded">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">📷</div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium">{{ $product->name }}</div>
                                <div class="text-sm text-gray-500">{{ Str::limit($product->description, 60) }}</div>
                            </td>
                            <td class="px-6 py-4 font-semibold">{{ number_format($product->price, 2) }} francs</td>
                            <td class="px-6 py-4">
                                <span class="{{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-3">
                                <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600 hover:text-blue-700">Modifier</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-700" 
                                            onclick="return confirm('Supprimer ce produit ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>