@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Checkout</h2>
    <form method="POST" action="{{ route('checkout.place') }}">
        @csrf
        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label>Address</label>
            <input type="text" name="address" value="{{ old('address') }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label>Payment Type</label>
            <select name="payment_type" class="w-full border rounded p-2" required>
                <option value="cod">Cash on Delivery</option>
                <option value="card">Credit Card</option>
            </select>
        </div>
        <h3 class="font-bold mb-2">Order Summary</h3>
        <ul class="mb-4">
            @foreach($cart as $item)
                <li>{{ $item['name'] }} x {{ $item['quantity'] }} - ${{ $item['price'] * $item['quantity'] }}</li>
            @endforeach
        </ul>
        <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Place Order</button>
    </form>
</div>
@endsection
