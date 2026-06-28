@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Modifier la catégorie</h2>

    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
        Retour
    </a>

</div>

<form action="{{ route('admin.categories.update', $category) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="mb-3">

                <label for="parent_id" class="form-label">
                    Catégorie parente
                </label>

                <select
                    name="parent_id"
                    id="parent_id"
                    class="form-select @error('parent_id') is-invalid @enderror">

                    <option value="">
                        Aucune (catégorie principale)
                    </option>

                    @foreach($parents as $parent)

                        <option
                            value="{{ $parent->id }}"
                            @selected(old('parent_id', $category->parent_id) == $parent->id)>

                            {{ $parent->name }}

                        </option>

                    @endforeach

                </select>

                @error('parent_id')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            <div class="mb-3">

                <label for="name" class="form-label">
                    Nom
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $category->name) }}"
                    autocomplete="off">

                @error('name')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            <div class="form-check">

                <input
                    type="checkbox"
                    class="form-check-input"
                    id="is_active"
                    name="is_active"
                    value="1"
                    @checked(old('is_active', $category->is_active))>

                <label class="form-check-label" for="is_active">
                    Active
                </label>

            </div>

        </div>

        <div class="card-footer text-end">

            <button type="submit" class="btn btn-primary">
                Enregistrer les modifications
            </button>

        </div>

    </div>

</form>

@endsection