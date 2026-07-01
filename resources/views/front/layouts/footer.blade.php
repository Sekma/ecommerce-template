<footer class="bg-light border-top mt-5">
    <div class="container py-5">

        <div class="row gy-4">

            <div class="col-lg-4">
                <img src="{{ asset('images/logo/logo.png') }}"
                     alt="{{ config('app.name') }}"
                     height="40">

                <p class="mt-3 mb-0 text-muted">
                    @yield('footer_description')
                </p>
            </div>

            <div class="col-6 col-lg-2">
                <h6 class="fw-bold mb-3">Catégories</h6>

                <ul class="list-unstyled mb-0">
                    {{-- Catégories principales --}}
                </ul>
            </div>

            <div class="col-6 col-lg-2">
                <h6 class="fw-bold mb-3">Informations</h6>

                <ul class="list-unstyled mb-0">
                    <li><a href="#" class="text-decoration-none">FAQ</a></li>
                    <li><a href="#" class="text-decoration-none">Livraison</a></li>
                    <li><a href="#" class="text-decoration-none">Retours</a></li>
                    <li><a href="#" class="text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <div class="col-6 col-lg-2">
                <h6 class="fw-bold mb-3">Légal</h6>

                <ul class="list-unstyled mb-0">
                    <li><a href="#" class="text-decoration-none">Conditions générales</a></li>
                    <li><a href="#" class="text-decoration-none">Politique de confidentialité</a></li>
                </ul>
            </div>

            <div class="col-6 col-lg-2">
                <h6 class="fw-bold mb-3">Newsletter</h6>

                <form>
                    <div class="input-group">
                        <input type="email"
                               class="form-control"
                               placeholder="Votre email">

                        <button class="btn btn-primary" type="submit">
                            OK
                        </button>
                    </div>
                </form>

                <div class="d-flex gap-2 mt-3">
                    {{-- Réseaux sociaux --}}
                </div>
            </div>

        </div>

        <hr>

        <div class="text-center small text-muted">
            &copy; {{ date('Y') }} {{ config('app.name') }}. Tous droits réservés.
        </div>

    </div>
</footer>