@extends('admin.layout.app')

@section('title', 'Products')
@section('content')

<div class="card">
<div class="card-header">
<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambah">
    Tambah Product
</button>
</div>

<div class="card-body">

<table class="table table-bordered">
<thead>
<tr>
<th>No</th>
<th>Name</th>
<th>Price</th>
<th>Condition</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tbody>

@forelse($products as $p)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $p->name }}</td>
<td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
<td>{{ $p->condition }}</td>
<td>
@if($p->status)
<span class="badge bg-success">Active</span>
@else
<span class="badge bg-danger">Non Active</span>
@endif
</td>

<td>
<a href="{{ route('products.edit',$p->id) }}" class="btn btn-warning btn-sm">Edit</a>

<form action="{{ route('products.destroy', $p->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button onclick="return confirm('Yakin hapus product ini?')" class="btn btn-danger btn-sm">
        Delete
    </button>
</form>
</td>

</tr>
@empty
<tr>
<td colspan="6" class="text-center">Belum ada data</td>
</tr>
@endforelse

</tbody>
</table>

</div>
</div>

<div class="modal fade" id="modalTambah">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form action="/products" method="POST">
        @csrf

        <div class="modal-header">
          <h5 class="modal-title">Tambah Product</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">

          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control" required>
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

        </div>

        <div class="modal-footer">
          <button class="btn btn-success">Simpan</button>
        </div>

      </form>

    </div>
  </div>
</div>




<script>
document.querySelector('input[name="price"]').addEventListener('input', function(e){
    let value = e.target.value.replace(/\D/g, '');
    e.target.value = value;
});
</script>

@endsection