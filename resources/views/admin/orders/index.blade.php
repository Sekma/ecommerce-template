
@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Commandes</h2>

    </div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="card">

        <div class="card-body p-0">

            <form method="GET" class="row mb-3">

                <div class="col-md-3">

                    <select name="status"
                            class="form-select"
                            onchange="this.form.submit()">

                        <option value="">Tous les statuts</option>

                        <option value="pending"
                            {{ request('status')=='pending' ? 'selected' : '' }}>
                            En attente
                        </option>

                        <option value="confirmed"
                            {{ request('status')=='confirmed' ? 'selected' : '' }}>
                            Confirmée
                        </option>

                        <option value="shipped"
                            {{ request('status')=='shipped' ? 'selected' : '' }}>
                            Expédiée
                        </option>

                        <option value="delivered"
                            {{ request('status')=='delivered' ? 'selected' : '' }}>
                            Livrée
                        </option>

                        <option value="cancelled"
                            {{ request('status')=='cancelled' ? 'selected' : '' }}>
                            Annulée
                        </option>

                    </select>

                </div>

            </form>

            <table class="table table-hover mb-0">

                <thead>

                    <tr>
                        <th>N°</th>
                        <th>Client</th>
                        <th>Total</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th width="120">Action</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($orders as $order)

                    <tr>

                        <td>{{ $order->order_number }}</td>

                        <td>
                            {{ $order->customer?->name ?? 'Client supprimé' }}
                        </td>

                        <td>{{ number_format($order->total,3) }} DT</td>

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

                        <td>

                            {{ $order->created_at->format('d/m/Y H:i') }}

                        </td>

                        <td>

                            <a href="{{ route('admin.orders.show',$order) }}"
                               class="btn btn-sm btn-primary">

                                Voir

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center py-4">

                            Aucune commande.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-3">

        {{ $orders->links() }}

    </div>

</div>

@endsection