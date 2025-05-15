@extends('layouts.app')

@section('content')
<div class="p-4 bg-white rounded shadow max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Add Product</h1>
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @include('products.form', ['button' => 'Create'])
    </form>
</div>
@endsection
