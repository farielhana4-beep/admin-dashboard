@extends('admin.layout.app')

@section('content')

<div class="card">
<div class="card-header">Tambah User</div>

<div class="card-body">
<form action="{{ route('users.store') }}" method="POST">
@csrf

<div class="form-group">
<label>Name</label>
<input type="text" name="name" class="form-control">
</div>

<div class="form-group">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control">
</div>

<button class="btn btn-primary">Simpan</button>

</form>
</div>
</div>

@endsection