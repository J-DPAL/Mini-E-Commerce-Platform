@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">All Orders</h2>
    <table class="w-full table-auto">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Email</th>
                <th>Total</th>
                <th>Date</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->email }}</td>
                <td>${{ $order->total }}</td>
                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                <td><a href="{{ route('admin.orders.show', $order->id) }}" class="text-blue-500">Details</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $orders->links() }}
</div>
@endsection 