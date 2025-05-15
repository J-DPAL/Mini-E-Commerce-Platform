@extends('layouts.app')

@section('content')
<div class="p-4 bg-white rounded shadow max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Product</h1>
    <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
        @method('PUT')
        @include('products.form', ['button' => 'Update'])
    </form>
</div>
@endsection
