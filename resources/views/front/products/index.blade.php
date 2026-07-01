@extends('front.layouts.app')

@section('title', 'Produits')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <h4 class="mb-0">Produits</h4>

</div>

<div class="row g-3">

    @forelse($products as $product)

        <div class="col-6 col-md-4 col-lg-3">

            @include('front.components.product-card', [
                'product' => $product
            ])

        </div>

    @empty

        <div class="col-12">

            <div class="alert alert-light border text-center">
                Aucun produit disponible
            </div>

        </div>

    @endforelse

</div>

@endsection