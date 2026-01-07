<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Projet Laravel')</title>
    <style>

        body { font-family: Arial; margin: 0; display: flex; flex-direction: column; min-height: 100vh; }
        nav ul { background: #005bb5; display: flex; justify-content: center; list-style: none; padding: 15px; margin: 0; }
        nav ul li a { color: white; text-decoration: none; padding: 14px 20px; }
        .container { display: flex; flex: 1; }
        .sidebar { width: 250px; background: #f4f4f4; padding: 15px; }
        .main-content { flex: 1; padding: 20px; }
        footer { background: #4376e6; color: white; text-align: center; padding: 10px; }
    </style>
    @yield('styles')
</head>
<body>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('articles.index') }}">Articles</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="{{ route('Produits.index') }}">Produits</a></li>
        </ul>
    </nav>

    <div class="container">
        <aside class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="#">Lien 1</a></li>
            </ul>
        </aside>

        <main class="main-content">
            @if(session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 15px; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 20px; text-align: center;">
        <strong>Succès !</strong> {{ session('success') }}
    </div>
@endif
            @yield('content') {{-- C'est ici que le contenu des autres pages s'injectera --}}
        </main>
    </div>

    <footer>
        <p>&copy; 2025 My website. Tous droits réservés.</p>
    </footer>

    @yield('scripts')
</body>
</html>
