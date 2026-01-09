
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

@extends('layout.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* *{
              border:  1px solid black
        } */
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0px;
            padding: 0px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;


        }

        nav ul {
            list-style-type: none;
            padding: 15px;
            margin-top: 0px;
            background: #005bb5;
            overflow: hidden;
            display: flex;
            justify-content: center;


        }

        nav ul li {
            padding: 14px 20px;

        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        .container {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 250px;
            background: #f4f4f4;
            padding: 15px;
            position: relative;
            top: 0px;

        }

        .main-content {
            flex: 1;
            padding: 20px;
        }

        footer {
            background: #4376e6;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0px;
            /* width: 100%; */


        }
    </style>
    @yield('styles')
</head>

<body>
    <nav>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="{{ route('articles.index') }}">Articles</a></li>
            <li><a href="{{ route('students.index') }}">students</a></li>
            <li><a href="../contact">Contact</a></li>

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
           {{-- C'est ici que le contenu des autres pages s'injectera --}}

            <h2>Sidebar</h2>
            <ul>
                <li><a href="">Link1</a></li>
                <li><a href="">Link2</a></li>
                <li><a href="">Link3</a></li>
                <li><a href="">Link4</a></li>
            </ul>
        </aside>
        <main class="main-content">
            {{-- <section>
                <h2>About Us</h2>
                <p>this is a simple html and css template to start your project</p>
            </section> --}}

            @yield('content')

        </main>
    </div>

    <footer>

        <p>&copy; 2025 My website. Tous droits réservés.</p>
    </footer>

    @yield('scripts')
</body>

        <p>&copy; 2025 My website. all rigth reserved.</p>
    </footer>

</body>



</html>
