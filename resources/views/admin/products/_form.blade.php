
<div class="card mb-4">
    <div class="card-header">
        Informations générales
    </div>

    <div class="card-body">

        <div class="mb-3">
            <label class="form-label">Nom *</label>

            <input type="text"
                   name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $product->name ?? '') }}">

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">

            <label class="form-label">Catégorie *</label>

            <select name="category_id"
                    class="form-select @error('category_id') is-invalid @enderror">

                <option value="">-- Choisir --</option>

                @foreach($categories as $parent)

                    <option value="{{ $parent->id }}"
                        {{ old('category_id', $product->category_id ?? '') == $parent->id ? 'selected' : '' }}>
                        {{ $parent->name }}
                    </option>

                    @foreach($parent->children as $child)

                        <option value="{{ $child->id }}"
                            {{ old('category_id', $product->category_id ?? '') == $child->id ? 'selected' : '' }}>

                            └── {{ $parent->name }} > {{ $child->name }}

                        </option>

                    @endforeach

                @endforeach

            </select>

            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">SKU</label>

            <input type="text"
                   name="sku"
                   class="form-control @error('sku') is-invalid @enderror"
                   value="{{ old('sku', $product->sku ?? '') }}">

            @error('sku')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

    </div>
</div>

<div class="card mb-4">

    <div class="card-header">
        Tarification
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-4">

                <label class="form-label">Prix *</label>

                <input type="number"
                       step="0.001"
                       name="price"
                       class="form-control @error('price') is-invalid @enderror"
                       value="{{ old('price', $product->price ?? '') }}">

                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            <div class="col-md-4">

                <label class="form-label">
                    Prix promotionnel
                </label>

                <input type="number"
                       step="0.001"
                       name="sale_price"
                       class="form-control"
                       value="{{ old('sale_price', $product->sale_price ?? '') }}">

            </div>

            <div class="col-md-4">

                <label class="form-label">
                    Stock
                </label>

                <input type="number"
                       name="stock"
                       class="form-control"
                       value="{{ old('stock', $product->stock ?? '') }}">

                <small class="text-muted">
                    Laisser vide pour le dropshipping.
                </small>

            </div>

        </div>

    </div>

</div>

<div class="card mb-4">

    <div class="card-header">
        Descriptions
    </div>

    <div class="card-body">

        <div class="mb-3">

            <label class="form-label">
                Description courte
            </label>

            <input type="text"
                   name="short_description"
                   class="form-control"
                   value="{{ old('short_description', $product->short_description ?? '') }}">

        </div>

        <div class="mb-3">

            <label class="form-label">
                Description complète
            </label>

            <textarea name="description"
                      rows="6"
                      class="form-control">{{ old('description', $product->description ?? '') }}</textarea>

        </div>

    </div>

</div>

<div class="card mb-4">

    <div class="card-header">
        Image principale
    </div>

    <div class="card-body">

        @if(isset($product) && $product->mainImage)

            <div class="mb-3">

                <img src="{{ asset($product->mainImage->path) }}"
                     width="180"
                     class="img-thumbnail">

            </div>

        @endif

        <label class="form-label">
            {{ isset($product) ? 'Remplacer l’image' : 'Image' }}
        </label>

        <input type="file"
               name="image"
               class="form-control @error('image') is-invalid @enderror"
               accept="image/*">

        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

    </div>

</div>

<div class="card mb-4">

    <div class="card-header">
        Options
    </div>

    <div class="card-body">

        <div class="form-check mb-2">

            <input class="form-check-input"
                   type="checkbox"
                   name="is_active"
                   value="1"
                   {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>

            <label class="form-check-label">

                Produit actif

            </label>

        </div>

        <div class="form-check">

            <input class="form-check-input"
                   type="checkbox"
                   name="is_featured"
                   value="1"
                   {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }}>

            <label class="form-check-label">

                Produit mis en avant

            </label>

        </div>

    </div>

</div>

<button class="btn btn-success">
    Enregistrer
</button>

<a href="{{ route('admin.products.index') }}"
   class="btn btn-secondary">
    Annuler
</a>