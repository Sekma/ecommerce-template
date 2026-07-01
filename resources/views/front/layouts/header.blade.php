<header class="bg-white border-bottom sticky-top">

    <div class="container-fluid py-2 d-flex align-items-center gap-3">

        {{-- Sidebar mobile --}}
        <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
            <i data-lucide="menu"></i>
        </button>

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none gap-2">

            <img src="{{ asset('images/logo/logo-icon.png') }}" height="38" alt="logo">
                    {{-- Search mobile --}}
                    <form action="{{ route('products.index') }}" method="GET" class="d-md-none flex-grow-1 ms-2">

                        <div class="input-group input-group-sm">

                            <input type="text"
                                name="search"
                                class="form-control"
                                placeholder="Rechercher...">

                            <button class="btn btn-primary">
                                <i data-lucide="search"></i>
                            </button>

                        </div>

                    </form>
            <span class="fw-bold text-dark d-none d-md-block">
                {{ config('app.name') }}
            </span>

        </a>

        {{-- Search --}}
        <form action="{{ route('products.index') }}" method="GET" class="flex-grow-1 d-none d-md-block">

            <div class="input-group">

                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Rechercher un produit...">

                <button class="btn btn-primary">
                    <i data-lucide="search"></i>
                </button>

            </div>

        </form>

        {{-- Actions --}}
        <div class="d-flex align-items-center gap-2 ms-auto">

            <a href="#" class="btn btn-light">
                <i data-lucide="user"></i>
            </a>

            <a href="#" class="btn btn-light position-relative">
                <i data-lucide="heart"></i>
            </a>

            <a href="#" class="btn btn-primary position-relative">

                <i data-lucide="shopping-cart"></i>

                <span class="position-absolute top-0 start-100 translate-middle badge bg-danger">
                    0
                </span>

            </a>

        </div>

    </div>

</header>