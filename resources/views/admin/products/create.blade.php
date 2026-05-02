<x-app-layout>
@push('styles')
    @vite('resources/css/adminstyle/styleproductcreate.css')
@endpush



    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Ajouter un nouveau produit</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-8">

                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nom du produit -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nom du produit</label>
                        <input type="text" name="name" 
                               class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               value="{{ old('name') }}" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" rows="4"
                                  class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                  required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Prix et Stock -->
                    <div class="grid grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Prix (francs)</label>
                            <input type="number" name="price" step="0.01" 
                                   class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                   value="{{ old('price') }}" required>
                            @error('price')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Stock disponible</label>
                            <input type="number" name="stock" 
                                   class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                   value="{{ old('stock') }}" required>
                            @error('stock')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Upload Image -->
                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Image du produit</label>
                        <input type="file" name="image" accept="image/*"
                               class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <p class="text-xs text-gray-500 mt-1">Formats acceptés : JPG, PNG, GIF, WebP (max 2MB)</p>
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-4">
                        <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-xl font-semibold flex-1">
                            ✅ Ajouter le produit
                        </button>
                        
                        <a href="{{ route('admin.products.index') }}" 
                           class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-8 py-4 rounded-xl font-semibold text-center">
                            Annuler
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>