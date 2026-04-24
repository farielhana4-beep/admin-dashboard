@extends('admin.layouts.app')

@section('title', 'Edit Product')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Product</h3>
    </div>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">
                <label>Nama Product</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="price" value="{{ $product->price }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Condition</label>
                <select name="condition" class="form-control">
                    <option value="baru" {{ $product->condition == 'baru' ? 'selected' : '' }}>Baru</option>
                    <option value="bekas" {{ $product->condition == 'bekas' ? 'selected' : '' }}>Bekas</option>
                    <option value="preorder" {{ $product->condition == 'preorder' ? 'selected' : '' }}>Preorder</option>
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Non Active</option>
                </select>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success">Update</button>
        </div>

    </form>
</div>

@endsection