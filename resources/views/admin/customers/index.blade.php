
@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Clients</h2>

    </div>

    <div class="card">

        <div class="card-body p-0">

            <table class="table table-hover mb-0">

                <thead>

                    <tr>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Gouvernorat</th>
                        <th>Commandes</th>
                        <th width="120">Action</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($customers as $customer)

                    <tr>

                        <td>{{ $customer->name }}</td>

                        <td>{{ $customer->phone }}</td>

                        <td>{{ $customer->email ?? '-' }}</td>

                        <td>{{ $customer->governorate }}</td>

                        <td>{{ $customer->orders_count }}</td>

                        <td>

                            <a href="{{ route('admin.customers.show', $customer) }}"
                               class="btn btn-sm btn-primary">
                                Voir
                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center py-4">
                            Aucun client.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-3">

        {{ $customers->links() }}

    </div>

</div>

@endsection