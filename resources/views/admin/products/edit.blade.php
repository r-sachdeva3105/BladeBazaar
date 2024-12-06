@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form action="{{ route('admin.products.update', $product['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
 
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $product['title']) }}" required>
        </div>
 
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $product['price']) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="image" class="form-label">Image URL</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $product['image']) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category" required>
                @foreach($categories as $category)
                    <option value="{{ $category }}" {{ $category == $product['category'] ? 'selected' : '' }}>{{ ucfirst($category) }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
