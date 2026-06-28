
@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>{{ $customer->name }}</h2>

        <a href="{{ route('admin.customers.index') }}"
           class="btn btn-secondary">
            Retour
        </a>

    </div>

    <div class="row">

        <div class="col-md-4">

            <div class="card mb-4">

                <div class="card-header">
                    Informations
                </div>

                <div class="card-body">

                    <p>
                        <strong>Nom :</strong><br>
                        {{ $customer->name }}
                    </p>

                    <p>
                        <strong>Téléphone :</strong><br>
                        {{ $customer->phone }}
                    </p>

                    <p>
                        <strong>Email :</strong><br>
                        {{ $customer->email ?: '-' }}
                    </p>

                    <p>
                        <strong>Gouvernorat :</strong><br>
                        {{ $customer->governorate }}
                    </p>

                    <p class="mb-0">
                        <strong>Adresse :</strong><br>
                        {{ $customer->address }}
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">
                    Historique des commandes
                </div>

                <div class="card-body p-0">

                    <table class="table table-hover mb-0">

                        <thead>

                            <tr>
                                <th>N°</th>
                                <th>Total</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th width="120">Action</th>
                            </tr>

                        </thead>

                        <tbody>

                        @forelse($customer->orders as $order)

                            <tr>

                                <td>{{ $order->order_number }}</td>

                                <td>{{ number_format($order->total, 3) }} DT</td>

                                <td>
                                    <span class="badge
                                        @if($order->status == 'pending') bg-warning
                                        @elseif($order->status == 'confirmed') bg-info
                                        @elseif($order->status == 'shipped') bg-primary
                                        @elseif($order->status == 'delivered') bg-success
                                        @else bg-danger
                                        @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>

                                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>

                                <td>

                                    <a href="{{ route('admin.orders.show', $order) }}"
                                       class="btn btn-sm btn-primary">

                                        Voir

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center py-4">

                                    Aucune commande.

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection