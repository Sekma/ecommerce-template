@extends('front.layouts.app')

@section('title', $category->name)

@section('content')

{{-- Header catégorie --}}
<div class="d-flex justify-content-between align-items-center mb-3">

    <div>
        <h4 class="mb-0">{{ $category->name }}</h4>
        <small class="text-muted">{{ $products->total() }} produits</small>
    </div>

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
                Aucun produit dans cette catégorie
            </div>
        </div>

    @endforelse

</div>

{{-- Pagination --}}
<div class="mt-4 d-flex justify-content-center">
    {{ $products->links() }}
</div>

@endsection