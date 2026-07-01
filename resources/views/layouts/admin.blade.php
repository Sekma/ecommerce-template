<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
<!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo/favicon.ico') }}" sizes="62x32">
   
    <!--  @vite(['resources/css/app.css', 'resources/js/app.js']) -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <aside class="col-md-2 bg-dark text-white min-vh-100 p-0">

            <div class="p-3 border-bottom">
                <div class="text-center py-3">

                    <img
                        src="{{ asset('images/logo/logo.png') }}"
                        alt="{{ config('app.name') }}"
                        class="img-fluid"
                        style="max-height:60px;">

                </div>
            </div>

            <div class="list-group list-group-flush">

                <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </a>

                <a href="{{ route('admin.categories.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-tags me-2"></i>
                    Catégories
                </a>

                <a href="{{ route('admin.products.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-box-seam me-2"></i>
                    Produits
                </a>

                <a href="{{ route('admin.orders.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-cart me-2"></i>
                    Commandes
                </a>

                <a href="{{ route('admin.customers.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-people me-2"></i>
                    Clients
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                    <i class="bi bi-gear me-2"></i>
                    Paramètres
                </a>

            </div>

        </aside>

        <!-- Contenu -->
        <main class="col-md-10 p-0">

            <nav class="navbar navbar-expand-lg bg-white border-bottom px-4">

                <span class="navbar-brand mb-0">
                    Administration
                </span>

                <div class="ms-auto d-flex align-items-center">

                    <span class="me-3">
                        {{ auth()->user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            Déconnexion
                        </button>
                    </form>

                </div>

            </nav>

            <div class="p-4">

                @yield('content')

            </div>

        </main>

    </div>
</div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 
</body>
</html>