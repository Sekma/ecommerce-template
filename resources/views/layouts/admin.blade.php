<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <aside class="col-md-2 bg-dark text-white min-vh-100 p-3">

            <h4 class="mb-4">{{ config('app.name') }}</h4>

            <div class="nav flex-column">

                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                    Dashboard
                </a>

                <a href="#" class="nav-link text-white">
                    Catégories
                </a>

                <a href="#" class="nav-link text-white">
                    Produits
                </a>

                <a href="#" class="nav-link text-white">
                    Commandes
                </a>

                <a href="#" class="nav-link text-white">
                    Clients
                </a>

                <a href="#" class="nav-link text-white">
                    Paramètres
                </a>

            </div>

        </aside>

        <!-- Contenu -->
        <main class="col-md-10">

            <nav class="navbar navbar-light bg-light border-bottom px-4">

                <span>Administration</span>

                <span>
                    {{ auth()->user()->name }}
                </span>

            </nav>

            <div class="p-4">

                @yield('content')

            </div>

        </main>

    </div>
</div>

</body>
</html>