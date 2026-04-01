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
        background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.5)), 
                    url('https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&q=80') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
    }

    .hero-content {
        max-width: 800px;
        padding: 2rem;
    }

    .hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: 4.2rem;
        font-weight: 900;
        line-height: 1.1;
        margin-bottom: 1.2rem;
        text-shadow: 0 4px 20px rgba(0,0,0,0.7);
    }

    .hero p {
        font-size: 1.35rem;
        margin-bottom: 3rem;
        opacity: 0.95;
    }

    .btn-start {
        background: linear-gradient(135deg, #e8903a, #d4691e);
        color: white;
        padding: 1.2rem 3.5rem;
        font-size: 1.3rem;
        font-weight: 600;
        border-radius: 9999px;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 10px 35px rgba(212, 105, 30, 0.45);
        transition: all 0.3s ease;
    }

    .btn-start:hover {
        transform: translateY(-6px) scale(1.05);
        box-shadow: 0 15px 45px rgba(212, 105, 30, 0.55);
    }
</style>

<div class="hero">
    <div class="hero-content">
        <h1>Bienvenue chez <span style="color: #f5c16c;">Divine Shop</span></h1>
        <p>Des produits stylés et de qualité pour les développeurs et passionnés</p>
        
        <!-- Bouton corrigé et simplifié -->
        <a href="{{ url('/register') }}" class="btn-start">
            Commencer mes achats →
        </a>

        <p style="margin-top: 3.5rem; font-size: 1.05rem; opacity: 0.85;">
            Inscription gratuite • Large choix • Paiement sécurisé
        </p>
    </div>
</div>

</x-guest-layout>