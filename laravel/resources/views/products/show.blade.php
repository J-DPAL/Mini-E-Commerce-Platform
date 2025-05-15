@extends('layouts.app')

@section('content')
<div class="p-4 bg-white rounded shadow max-w-xl mx-auto">
    <img src="{{ asset('storage/products/' . $product->image) }}" class="w-full h-64 object-cover rounded">
    <h2 class="text-2xl font-bold mt-4">{{ $product->name }}</h2>
    <p class="text-gray-700 mt-2">{{ $product->description }}</p>
    <p class="text-lg mt-2 font-semibold">Category: {{ $product->category }}</p>
    <p class="text-lg mt-2 font-semibold">Price: ${{ $product->price }}</p>
    <p class="text-lg mt-2 font-semibold">In Stock: {{ $product->stock_quantity }}</p>
</div>
@endsection
