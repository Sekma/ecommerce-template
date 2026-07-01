@include('front.layouts.head')

<body>
    {{-- Mobile Sidebar --}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar">

    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Catégories</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body p-0">
        @include('front.layouts.sidebar')
    </div>

</div>
    @include('front.layouts.header')

    <main class="py-4">

        <div class="container-fluid">

            <div class="row">

                {{-- Sidebar Desktop --}}
                <aside class="col-lg-3 d-none d-lg-block">
                    @include('front.layouts.sidebar')
                </aside>

                {{-- Contenu --}}
                <section class="col-12 col-lg-9">
                    @yield('content')
                </section>

            </div>

        </div>

    </main>

    @include('front.layouts.footer')

    <script>lucide.createIcons();</script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>
</html>