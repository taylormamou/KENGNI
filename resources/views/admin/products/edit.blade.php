<x-app-layout>
    @push('styles')
    @vite('resources/css/adminstyle/styleproductedit.css')
@endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier le produit : {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-8">

                <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nom du produit</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" rows="5" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Prix (francs )</label>
                            <input type="number" name="price" step="0.01" value="{{ old('price', $product->price) }}" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Stock</label>
                            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                        </div>
                    </div>

                    <!-- Image actuelle + Upload nouvelle -->
                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Image actuelle</label>
                        @if($product->image)
                            <img src="{{ asset($product->image)}}" alt="{{ $product->name }}" 
                                 class="w-48 h-48 object-cover rounded-xl mb-4 border">
                        @else
                            <p class="text-gray-500">Aucune image</p>
                        @endif

                        <label class="block text-sm font-medium text-gray-700 mb-2 mt-6">Changer l'image (optionnel)</label>
                        <input type="file" name="image" accept="image/*"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3">
                    </div>

                    <div class="flex gap-4">
                        <button type="submit" 
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-xl font-semibold flex-1">
                            Enregistrer les modifications
                        </button>
                        <a href="{{ route('admin.products.index') }}" 
                           class="bg-gray-300 hover:bg-gray-400 px-8 py-4 rounded-xl font-medium">
                            Annuler
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>