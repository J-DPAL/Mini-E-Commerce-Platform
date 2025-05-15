@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Product List</h1>

    <a href="{{ route('products.create') }}" class="bg-gray-100 text-black px-4 py-2 rounded border border-gray-300">Add Product</a>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($products as $product)
            <div class="bg-white p-4 rounded shadow">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-48 object-cover rounded mb-2">
                @endif
                <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                <p class="text-gray-700">${{ $product->price }}</p>

                <div class="mt-2 flex gap-2">
                    <a href="{{ route('products.show', $product) }}" class="text-blue-500 hover:underline">View</a>
                    <a href="{{ route('products.edit', $product) }}" class="text-yellow-500 hover:underline">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection
