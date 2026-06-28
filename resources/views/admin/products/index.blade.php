@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Produits</h2>

    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
        + Nouveau produit
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="GET" class="row mb-4">

    <div class="col-md-4">

        <select name="category"
                class="form-select"
                onchange="this.form.submit()">

            <option value="">Toutes les catégories</option>

            @foreach($categories as $parent)

                <option value="{{ $parent->id }}"
                    {{ request('category') == $parent->id ? 'selected' : '' }}>
                    {{ $parent->name }}
                </option>

                @foreach($parent->children as $child)

                    <option value="{{ $child->id }}"
                        {{ request('category') == $child->id ? 'selected' : '' }}>
                        {{ $parent->name }} > {{ $child->name }}
                    </option>

                @endforeach

            @endforeach

        </select>

    </div>

</form>

@if($products->count())

<table class="table table-bordered align-middle">

    <thead>

    <tr>
        <th width="90">Image</th>
        <th>Produit</th>
        <th>Catégorie</th>
        <th>Prix</th>
        <th>Stock</th>
        <th>Statut</th>
        <th width="180">Actions</th>
    </tr>

    </thead>

    <tbody>

    @foreach($products as $product)

        <tr>

            <td>

                @if($product->mainImage)

                    <img src="{{ asset($product->mainImage->path) }}"
                         width="70"
                         height="70"
                         style="object-fit:cover;border-radius:8px;">

                @else

                    <img src="{{ asset('images/logo/no-image.png') }}"
                         width="70"
                         height="70"
                         style="object-fit:cover;border-radius:8px;">

                @endif

            </td>

            <td>
                <strong>{{ $product->name }}</strong>
                <br>
                <small>{{ $product->sku }}</small>
            </td>

            <td>
                @if($product->category->parent)
                    {{ $product->category->parent->name }} > {{ $product->category->name }}
                @else
                    {{ $product->category->name }}
                @endif
            </td>

            <td>{{ number_format($product->price,3) }}</td>

            <td>{{ $product->stock ?? 'Dropshipping' }}</td>

            <td>
                @if($product->is_active)
                    <span class="badge bg-success">Actif</span>
                @else
                    <span class="badge bg-danger">Inactif</span>
                @endif
            </td>

            <td>

                <a href="{{ route('admin.products.edit',$product) }}"
                   class="btn btn-warning btn-sm">
                    Modifier
                </a>

                <form action="{{ route('admin.products.destroy',$product) }}"
                      method="POST"
                      class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Supprimer ce produit ?')">
                        Supprimer
                    </button>

                </form>

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

{{ $products->links() }}

@else

<div class="alert alert-info">
    Aucun produit.

</div>

@endif

@endsection