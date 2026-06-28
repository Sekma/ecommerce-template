@extends('layouts.admin')

@section('content')

<h2 class="mb-4">
    Tableau de bord
</h2>

<div class="row">

    <div class="col-md-3 mb-4">

        <div class="card border-primary shadow-sm">

            <div class="card-body text-center">

                <h5>Produits</h5>

                <h2 class="text-primary">
                    {{ $products }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card border-success shadow-sm">

            <div class="card-body text-center">

                <h5>Catégories</h5>

                <h2 class="text-success">
                    {{ $categories }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card border-warning shadow-sm">

            <div class="card-body text-center">

                <h5>Clients</h5>

                <h2 class="text-warning">
                    {{ $customers }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card border-danger shadow-sm">

            <div class="card-body text-center">

                <h5>Commandes</h5>

                <h2 class="text-danger">
                    {{ $orders }}
                </h2>

            </div>

        </div>

    </div>

</div>

@endsection