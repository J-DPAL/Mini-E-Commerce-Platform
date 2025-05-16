@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Your Shopping Cart</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif

    @if(count($cart) > 0)
        <table class="w-full bg-white shadow rounded mb-4">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2">Product</th>
                    <th class="p-2">Price</th>
                    <th class="p-2">Quantity</th>
                    <th class="p-2">Subtotal</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td class="p-2">{{ $item['name'] }}</td>
                        <td class="p-2">${{ number_format($item['price'], 2) }}</td>
                        <td class="p-2">
                            <form method="POST" action="{{ route('cart.update', $id) }}" class="inline">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 p-1 border rounded">
                                <button class="ml-2 px-2 py-1 bg-blue-500 text-black rounded">Update</button>
                            </form>
                        </td>
                        <td class="p-2">${{ number_format($subtotal, 2) }}</td>
                        <td class="p-2">
                            <form method="POST" action="{{ route('cart.remove', $id) }}" class="inline">
                                @csrf
                                <button class="px-2 py-1 bg-red-500 text-black rounded">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right font-bold text-xl">Total: ${{ number_format($total, 2) }}</div>

        <a href="{{ route('checkout.form') }}" class="inline-block mt-4 px-4 py-2 bg-green-500 text-black rounded">
            Proceed to Checkout
        </a>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
