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
        background: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.45)), 
                    url('https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&q=80') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        position: relative;
    }

    .hero-content {
        max-width: 800px;
        padding: 2rem;
        z-index: 2;
    }

    .hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: 4.5rem;
        font-weight: 900;
        line-height: 1.1;
        margin-bottom: 1rem;
        text-shadow: 0 4px 20px rgba(0,0,0,0.6);
    }

    .hero p {
        font-size: 1.35rem;
        margin-bottom: 2.5rem;
        opacity: 0.95;
    }

    .btn-start {
        background: linear-gradient(135deg, #e8903a, #d4691e);
        color: white;
        padding: 1.1rem 3rem;
        font-size: 1.25rem;
        font-weight: 600;
        border-radius: 9999px;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 10px 30px rgba(212, 105, 30, 0.4);
        transition: all 0.3s ease;
    }

    .btn-start:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 15px 40px rgba(212, 105, 30, 0.5);
    }

    .features {
        padding: 5rem 0;
        background: white;
    }

    .feature-card {
        text-align: center;
        padding: 2.5rem 1.5rem;
    }

    .feature-icon {
        font-size: 3.5rem;
        margin-bottom: 1.5rem;
    }
</style>

<div class="hero">
    <div class="hero-content">
        <h1>Bienvenue chez <span style="color: #f5c16c;">Divine Shop</span></h1>
        <p>Des produits de qualité pour les passionnés de développement et de style</p>
        
            <a href="/register" class="btn-start">
                Commencer mes achats →
            </a>
        
        <p style="margin-top: 3rem; font-size: 1rem; opacity: 0.8;">
            Inscription gratuite • Livraison rapide • Paiement sécurisé
        </p>
    </div>
</div>

<!-- Section Features -->
<div class="features">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="feature-card">
                <div class="feature-icon">🛍️</div>
                <h3 style="font-family: 'Playfair Display', serif; font-size: 1.6rem; margin-bottom: 0.8rem;">Large choix</h3>
                <p style="color: #8a5c2e;">Des t-shirts, mugs, accessoires et plus encore aux couleurs de Laravel & PHP</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🚚</div>
                <h3 style="font-family: 'Playfair Display', serif; font-size: 1.6rem; margin-bottom: 0.8rem;">Livraison rapide</h3>
                <p style="color: #8a5c2e;">Commandes traitées en 24h</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3 style="font-family: 'Playfair Display', serif; font-size: 1.6rem; margin-bottom: 0.8rem;">Sécurisé</h3>
                <p style="color: #8a5c2e;">Paiement fictif sécurisé pour cette démo</p>
            </div>
        </div>
    </div>
</div>

</x-guest-layout>