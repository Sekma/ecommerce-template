@extends('layouts.admin')

@section('content')

<div class="container">

    <h2 class="mb-4">Nouveau produit</h2>

    <form action="{{ route('admin.products.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        @include('admin.products._form')

    </form>

</div>

@endsection