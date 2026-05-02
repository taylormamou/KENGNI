<x-app-layout>
@push('styles')
    @vite('resources/css/adminstyle/styleproductdash.css')
@endpush

    <x-slot name="header">
        <div class="admin-header">
            <h2>👑 Tableau de Bord Administrateur</h2>
            <span class="admin-badge">Admin</span>
        </div>
    </x-slot>

    <div class="py-12 admin-dashboard">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Bienvenue -->
            <div class="welcome-banner">
                <div>
                    <h1>Bienvenue, {{ Auth::user()->name }} 👋</h1>
                    <p>Voici un aperçu de votre boutique aujourd'hui.</p>
                </div>
                <div class="welcome-date">
                    {{ now()->format('d F Y') }}
                </div>
            </div>

            <!-- Statistiques -->
            <div class="stats-grid">
                <div class="stat-card indigo">
                    <div class="stat-icon">📦</div>
                    <div class="stat-value">{{ \App\Models\Product::count() }}</div>
                    <div class="stat-label">Produits</div>
                </div>
                <div class="stat-card green">
                    <div class="stat-icon">📋</div>
                    <div class="stat-value">{{ \App\Models\Order::count() }}</div>
                    <div class="stat-label">Commandes</div>
                </div>
                <div class="stat-card amber">
                    <div class="stat-icon">💰</div>
                    <div class="stat-value">{{ number_format(\App\Models\Order::sum('total'), 0, ',', ' ') }}</div>
                    <div class="stat-label">Revenus (FCFA)</div>
                </div>
                <div class="stat-card purple">
                    <div class="stat-icon">👥</div>
                    <div class="stat-value">{{ \App\Models\User::count() }}</div>
                    <div class="stat-label">Utilisateurs</div>
                </div>
            </div>

            <!-- Actions rapides -->
            <div class="actions-section">
                <h3>Actions rapides</h3>
                <div class="actions-grid">
                    <a href="{{ route('admin.products.index') }}" class="action-card">
                        <span class="action-icon">📦</span>
                        <div>
                            <div class="action-title">Gérer les Produits</div>
                            <div class="action-sub">Ajouter, modifier, supprimer</div>
                        </div>
                        <span class="action-arrow">→</span>
                    </a>
                    <a href="{{ route('admin.orders.index') }}" class="action-card">
                        <span class="action-icon">📋</span>
                        <div>
                            <div class="action-title">Voir les Commandes</div>
                            <div class="action-sub">Suivre et gérer les commandes</div>
                        </div>
                        <span class="action-arrow">→</span>
                    </a>
                    <a href="{{ route('admin.products.create') }}" class="action-card highlight">
                        <span class="action-icon">➕</span>
                        <div>
                            <div class="action-title">Nouveau Produit</div>
                            <div class="action-sub">Ajouter un produit au catalogue</div>
                        </div>
                        <span class="action-arrow">→</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>