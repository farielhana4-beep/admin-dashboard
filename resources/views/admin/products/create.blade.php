@extends('admin.layouts.app')

@section('content')

<div class="card">
<div class="card-header">
<h3>Tambah Product</h3>
</div>

<div class="card-body">
<form action="{{ route('products.store') }}" method="POST">
@csrf

<div class="form-group">
<label>Name</label>
<input type="text" name="name" class="form-control">
</div>

<div class="form-group">
<label>Price</label>
<input type="number" name="price" class="form-control">
</div>

<div class="form-group">
<label>Condition</label>
<select name="condition" class="form-control">
<option value="baru">Baru</option>
<option value="bekas">Bekas</option>
<option value="preorder">Preorder</option>
</select>
</div>

<div class="form-group">
<label>Status</label>
<select name="status" class="form-control">
<option value="1">Active</option>
<option value="0">Non Active</option>
</select>
</div>

<button class="btn btn-primary">Simpan</button>

</form>
</div>
</div>

@endsection