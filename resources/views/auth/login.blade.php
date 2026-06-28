<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Connexion - {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-header text-center">

                    <div class="text-center mb-4">

                        <img
                            src="{{ asset('images/logo/logo.png') }}"
                            alt="{{ config('app.name') }}"
                            class="img-fluid mb-3"
                            style="max-height:70px;">

                        <h4 class="mb-0">{{ config('app.name') }}</h4>

                    </div>

                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('login') }}">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                required
                                autofocus>

                            @error('email')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Mot de passe
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required>

                            @error('password')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-check mb-3">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                                id="remember">

                            <label class="form-check-label" for="remember">

                                Se souvenir de moi

                            </label>

                        </div>

                        <button class="btn btn-primary w-100">

                            Se connecter

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>