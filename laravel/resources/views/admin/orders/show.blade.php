@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Order #{{ $order->id }}</h2>
    <p><strong>Name:</strong> {{ $order->name }}</p>
    <p><strong>Email:</strong> {{ $order->email }}</p>
    <p><strong>Address:</strong> {{ $order->address }}</p>
    <p><strong>Payment Type:</strong> {{ $order->payment_type }}</p>
    <p><strong>Total:</strong> ${{ $order->total }}</p>
    <h3 class="font-bold mt-4 mb-2">Items</h3>
    <ul>
        @foreach($order->items as $item)
            <li>{{ $item->product->name ?? 'Product deleted' }} x {{ $item->quantity }} - ${{ $item->price * $item->quantity }}</li>
        @endforeach
    </ul>
    <a href="{{ route('admin.orders') }}" class="mt-4 inline-block text-blue-500">Back to Orders</a>
</div>
@endsection 