<x-guest-layout>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Inter:wght@300;400;500&display=swap');

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        font-family: 'Inter', sans-serif;
        min-height: 100vh;
        background: linear-gradient(135deg, #fdf6ec 0%, #fde8cc 50%, #fcd5a8 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
    }

    .card {
        background: #fffaf4;
        border-radius: 24px;
        padding: 2.5rem;
        width: 100%;
        max-width: 420px;
        box-shadow: 0 20px 60px rgba(200, 120, 40, 0.12), 0 4px 16px rgba(0,0,0,0.06);
        border: 1px solid rgba(230, 160, 80, 0.2);
        animation: fadeUp 0.5s ease both;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .brand {
        text-align: center;
        margin-bottom: 2rem;
    }

    .brand-emoji { font-size: 2.4rem; display: block; margin-bottom: 0.5rem; }

    .brand-name {
        font-family: 'Playfair Display', serif;
        font-size: 1.7rem;
        color: #3d1f00;
        letter-spacing: 0.02em;
    }

    .brand-sub {
        font-size: 0.78rem;
        color: #b07840;
        margin-top: 0.2rem;
    }

    .divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, #e8b070, transparent);
        margin-bottom: 2rem;
    }

    .field { margin-bottom: 1.2rem; }

    .field label {
        display: block;
        font-size: 0.75rem;
        font-weight: 500;
        color: #8a5c2e;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 0.4rem;
    }

    .field input {
        width: 100%;
        background: #fff7ee;
        border: 1.5px solid #e8c99a;
        border-radius: 10px;
        padding: 0.8rem 1rem;
        font-family: 'Inter', sans-serif;
        font-size: 0.9rem;
        color: #3d1f00;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .field input:focus {
        border-color: #d4872a;
        box-shadow: 0 0 0 3px rgba(212, 135, 42, 0.12);
    }

    .field input::placeholder { color: #c4a07a; }

    .error { color: #c0392b; font-size: 0.75rem; margin-top: 0.3rem; }

    .row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
    }

    .remember {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.82rem;
        color: #8a5c2e;
        cursor: pointer;
    }

    .remember input { accent-color: #d4872a; width: 15px; height: 15px; }

    .forgot {
        font-size: 0.8rem;
        color: #d4872a;
        text-decoration: none;
        font-weight: 500;
    }

    .forgot:hover { color: #a85e10; }

    .btn {
        width: 100%;
        background: linear-gradient(135deg, #e8903a, #d4691e);
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 0.9rem;
        font-family: 'Inter', sans-serif;
        font-size: 0.95rem;
        font-weight: 500;
        cursor: pointer;
        transition: transform 0.15s, box-shadow 0.2s;
        box-shadow: 0 6px 20px rgba(212, 105, 30, 0.35);
    }

    .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 10px 28px rgba(212, 105, 30, 0.45);
    }

    .footer-link {
        text-align: center;
        margin-top: 1.5rem;
        font-size: 0.82rem;
        color: #8a5c2e;
    }

    .footer-link a {
        color: #d4872a;
        font-weight: 500;
        text-decoration: none;
    }
</style>

<div class="card">
    <div class="brand">
        <span class="brand-emoji">🛍️</span>
        <div class="brand-name">Ma Boutique</div>
        <div class="brand-sub">Bon retour parmi nous ✨</div>
    </div>
    <div class="divider"></div>

    @if (session('status'))
        <div style="background:#fff3e0;border:1px solid #f0a830;border-radius:8px;padding:0.7rem 1rem;font-size:0.82rem;color:#7a4800;margin-bottom:1.2rem;">
            ℹ️ {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="field">
            <label>📧 Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="toi@exemple.com" required autofocus>
            @error('email') <div class="error">⚠️ {{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label>🔒 Mot de passe</label>
            <input type="password" name="password" placeholder="••••••••" required>
            @error('password') <div class="error">⚠️ {{ $message }}</div> @enderror
        </div>

        <div class="row">
            <label class="remember">
                <input type="checkbox" name="remember"> Se souvenir de moi
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot">Mot de passe oublié ?</a>
            @endif
        </div>

        <button type="submit" class="btn">🚀 Se connecter</button>
    </form>

    <div class="footer-link">
        Pas encore de compte ? <a href="{{ route('register') }}">S'inscrire 🎉</a>
    </div>
</div>
</x-guest-layout>