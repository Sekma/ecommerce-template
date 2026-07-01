@extends('front.layouts.app')

@section('title', 'Accueil')

@section('content')

<div class="row g-3">

    {{-- TEST MANUEL (remplace par loop plus tard) --}}
    <div class="col-6 col-md-4 col-lg-3">
        @include('front.components.product-card', [
            'product' => (object) [
                'name' => 'Produit Test',
                'price' => 120,
                'sale_price' => 90,
                'slug' => 'produit-test',
                'free_shipping' => true,
                'mainImage' => (object) [
                    'path' => 'images/logo/no-image.png'
                ]
            ]
        ])
    </div>

</div>

@endsection