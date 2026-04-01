<x-guest-layout>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;500;600&display=swap');

    body {
        font-family: 'Inter', system-ui, sans-serif;
        background: #fdf6ec;
        color: #3d1f00;
    }

    .hero {
        min-height: 100vh;
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.55)), 
                    url('https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&q=80') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
    }

    .hero-content {
        max-width: 820px;
        padding: 2rem;
    }

    .hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: 4.5rem;
        font-weight: 900;
        line-height: 1.05;
        margin-bottom: 1rem;
        text-shadow: 0 5px 25px rgba(0,0,0,0.7);
    }

    .hero p {
        font-size: 1.4rem;
        margin-bottom: 3rem;
        opacity: 0.92;
    }

    .btn-start {
        background: linear-gradient(135deg, #e8903a, #d4691e);
        color: white;
        padding: 1.25rem 3.8rem;
        font-size: 1.35rem;
        font-weight: 600;
        border-radius: 50px;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 12px 35px rgba(212, 105, 30, 0.5);
        transition: all 0.3s ease;
    }

    .btn-start:hover {
        transform: translateY(-8px) scale(1.06);
        box-shadow: 0 18px 50px rgba(212, 105, 30, 0.6);
    }
</style>

<div class="hero">
    <div class="hero-content">
        <h1>Bienvenue chez <span style="color: #f5c16c;">Divine Shop</span></h1>
        <p>Des produits de qualité pour les passionnés de développement et de style</p>
        
        <!-- Lien forcé vers Register -->
        <a href="/register" class="btn-start">
            Commencer mes achats →
        </a>

        <p style="margin-top: 4rem; font-size: 1.1rem; opacity: 0.85;">
            Création de compte gratuite • Large sélection • Paiement sécurisé
        </p>
    </div>
</div>

</x-guest-layout>