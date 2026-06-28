
@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Commande {{ $order->order_number }}</h2>

        <a href="{{ url()->previous() }}" 
            class="btn btn-secondary">
            Retour
        </a>

    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="row">

        <div class="col-md-4">

            <div class="card mb-4">

                <div class="card-header">
                    Client
                </div>

                <div class="card-body">

                    @if($order->customer)

                        <strong>{{ $order->customer->full_name }}</strong><br>
                        {{ $order->customer->email }}<br>
                        {{ $order->customer->phone }}

                    @else

                        Client supprimé

                    @endif

                </div>

            </div>

            <div class="card">

                <div class="card-header">
                    Commande
                </div>

                <div class="card-body">

                    <p>
                        <strong>Statut :</strong><br>

                        <span class="badge
                            @if($order->status == 'pending') bg-warning
                            @elseif($order->status == 'confirmed') bg-info
                            @elseif($order->status == 'shipped') bg-primary
                            @elseif($order->status == 'delivered') bg-success
                            @else bg-danger
                            @endif">
                            {{ ucfirst($order->status) }}
                        </span>

                    </p>

                    <p>
                        <strong>Sous-total :</strong><br>
                        {{ number_format($order->subtotal,3) }} DT
                    </p>

                    <p>
                        <strong>Livraison :</strong><br>
                        {{ number_format($order->shipping_cost,3) }} DT
                    </p>

                    <p class="mb-0">
                        <strong>Total :</strong><br>
                        <strong>{{ number_format($order->total,3) }} DT</strong>
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">
                    Produits commandés
                </div>

                <div class="card-body p-0">

                    <table class="table table-bordered mb-0">

                        <thead>

                            <tr>
                                <th>Produit</th>
                                <th width="120">Prix</th>
                                <th width="100">Qté</th>
                                <th width="120">Total</th>
                            </tr>

                        </thead>

                        <tbody>

                        @foreach($order->items as $item)

                            <tr>

                                <td>{{ $item->product_name }}</td>

                                <td>{{ number_format($item->price,3) }} DT</td>

                                <td>{{ $item->quantity }}</td>

                                <td>{{ number_format($item->total,3) }} DT</td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>
                
            <div class="card mt-4">

                <div class="card-header">
                    Modifier le statut
                </div>

                <div class="card-body">

                    <form method="POST"
                        action="{{ route('admin.orders.updateStatus', $order) }}">

                        @csrf
                        @method('PATCH')

                        <div class="row">

                            <div class="col-md-4">

                                <select name="status" class="form-select">

                                    <option value="pending"
                                        @selected($order->status=='pending')>
                                        En attente
                                    </option>

                                    <option value="confirmed"
                                        @selected($order->status=='confirmed')>
                                        Confirmée
                                    </option>

                                    <option value="shipped"
                                        @selected($order->status=='shipped')>
                                        Expédiée
                                    </option>

                                    <option value="delivered"
                                        @selected($order->status=='delivered')>
                                        Livrée
                                    </option>

                                    <option value="cancelled"
                                        @selected($order->status=='cancelled')>
                                        Annulée
                                    </option>

                                </select>

                            </div>

                            <div class="col-md-2">

                                <button class="btn btn-success">
                                    Enregistrer
                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>



            </div>

            @if($order->notes)

                <div class="card mt-4">

                    <div class="card-header">
                        Notes
                    </div>

                    <div class="card-body">

                        {{ $order->notes }}

                    </div>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection