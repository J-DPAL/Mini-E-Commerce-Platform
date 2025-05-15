@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-4 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Checkout</h1>

    @if (count($cart) > 0)
        <ul class="divide-y">
            @foreach ($cart as $item)
                <li class="py-2 flex justify-between">
                    <span>{{ $item['name'] }} x{{ $item['quantity'] }}</span>
                    <span>${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                </li>
            @endforeach
        </ul>

        <div class="mt-4 text-right font-bold text-lg">
            Total: ${{ number_format($total, 2) }}
        </div>

        <form action="{{ route('checkout.form') }}" method="POST" class="mt-6 space-y-4">
            @csrf

            <input type="text" name="name" placeholder="Full Name" required class="w-full p-2 border rounded">
            <input type="email" name="email" placeholder="Email Address" required class="w-full p-2 border rounded">
            <input type="text" name="address" placeholder="Shipping Address" required class="w-full p-2 border rounded">

            <select name="payment_type" required class="w-full p-2 border rounded">
                <option value="">Select Payment Type</option>
                <option value="Cash">Cash</option>
                <option value="Card">Card</option>
            </select>

            <button type="submit" class="w-full bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">
                Place Order
            </button>
        </form>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
