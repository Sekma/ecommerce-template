@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Catégories</h2>

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        + Nouvelle catégorie
    </a>

</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if($parents->count())

<table class="table table-bordered table-hover align-middle">

    <thead>

        <tr>
            <th width="70">ID</th>
            <th>Nom</th>
            <th>Slug</th>
            <th width="120">Statut</th>
            <th width="180">Actions</th>
        </tr>

    </thead>

    <tbody>

    @foreach($parents as $category)

        <tr>

            <td>{{ $category->id }}</td>

            <td>
                <strong>{{ $category->name }}</strong>
            </td>

            <td>{{ $category->slug }}</td>

            <td>
                @if($category->is_active)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-secondary">Inactive</span>
                @endif
            </td>

            <td>

                <a href="{{ route('admin.categories.edit', $category) }}"
                   class="btn btn-warning btn-sm">
                    Modifier
                </a>

                <form action="{{ route('admin.categories.destroy', $category) }}"
                      method="POST"
                      class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Supprimer cette catégorie ?')">
                        Supprimer
                    </button>

                </form>

            </td>

        </tr>

        @foreach($category->children as $child)

            <tr>

                <td>{{ $child->id }}</td>

                <td class="ps-5">
                    └── {{ $child->name }}
                </td>

                <td>{{ $child->slug }}</td>

                <td>

                    @if($child->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif

                </td>

                <td>

                    <a href="{{ route('admin.categories.edit', $child) }}"
                       class="btn btn-warning btn-sm">
                        Modifier
                    </a>

                    <form action="{{ route('admin.categories.destroy', $child) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Supprimer cette catégorie ?')">
                            Supprimer
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

    @endforeach

    </tbody>

</table>

@else

<div class="alert alert-info">
    Aucune catégorie.
</div>

@endif

@endsection