<!-- resources/views/products/form.blade.php -->
@csrf
<div class="grid grid-cols-1 gap-4">
    <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" placeholder="Name" class="p-2 border rounded">
    <input type="text" name="category" value="{{ old('category', $product->category ?? '') }}" placeholder="Category" class="p-2 border rounded">
    <textarea name="description" class="p-2 border rounded" placeholder="Description">{{ old('description', $product->description ?? '') }}</textarea>
    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price ?? '') }}" placeholder="Price" class="p-2 border rounded">
    <input type="number" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity ?? '') }}" placeholder="Stock" class="p-2 border rounded">
    <input type="file" name="image" class="p-2 border rounded">
    <button type="submit" class="bg-gray-100 text-black px-4 py-2 rounded border border-gray-300">{{ $button ?? 'Save' }}</button>
</div>
