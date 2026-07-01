<div class="card h-100 border-0 shadow-sm product-card">

    {{-- Image --}}
    <a href="{{ route('products.show', $product->slug ?? '#') }}">
        <div class="position-relative">

            <div class="product-card-image">
                <img
                    src="{{ asset($product->mainImage->path ?? 'images/logo/no-image.png') }}"
                    alt="{{ $product->name }}"
                    loading="lazy">
            </div>

            {{-- Badge promo --}}
            @if($product->sale_price && $product->sale_price < $product->price)
                <span class="position-absolute top-0 start-0 m-2 badge bg-danger">
                    -{{ round(100 - ($product->sale_price / $product->price) * 100) }}%
                </span>
            @endif

        </div>
    </a>

    {{-- Body --}}
    <div class="card-body d-flex flex-column">

        <h6 class="card-title mb-3">
            {{ $product->name }}
        </h6>

        {{-- Prix --}}
        <div class="mb-2 mt-auto">

            @if($product->sale_price && $product->sale_price < $product->price)

                <span class="text-danger fw-bold">
                    {{ number_format($product->sale_price, 2) }} DT
                </span>

                <span class="text-muted text-decoration-line-through ms-1 small">
                    {{ number_format($product->price, 2) }} DT
                </span>

            @else

                <span class="fw-bold">
                    {{ number_format($product->price, 2) }} DT
                </span>

            @endif

        </div>

        @if($product->free_shipping)

            <div class="small text-success fw-semibold mb-2">
                <i data-lucide="truck"></i>
                Livraison gratuite
            </div>

        @endif

        {{-- Actions --}}
        <div class="d-flex gap-2">

            <button class="btn btn-primary btn-sm w-100">
                <i data-lucide="shopping-cart"></i>
            </button>

            <button class="btn btn-light btn-sm">
                <i data-lucide="heart"></i>
            </button>

        </div>

    </div>

</div>