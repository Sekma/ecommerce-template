@extends('layouts.admin')

@section('content')

<div class="container">

    <h2 class="mb-4">Modifier le produit</h2>

    <form action="{{ route('admin.products.update', $product) }}" method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('admin.products._form')

    </form>

</div>

@endsection