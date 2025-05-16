@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white p-6 rounded shadow text-center">
    <h2 class="text-2xl font-bold mb-4">Thank you!</h2>
    <p>Your order has been placed successfully.</p>
    <a href="{{ url('/') }}" class="mt-4 inline-block text-blue-500">Back to Home</a>
</div>
@endsection 