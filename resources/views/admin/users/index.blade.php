@extends('admin.layouts.app')

@section('title', 'Users')
@section('content')

<div class="card">
<div class="card-header">
<a href="{{ route('users.create') }}" class="btn btn-primary mb-3">
    Tambah User
</a>
</div>

<div class="card-body">

<form method="GET" class="mb-3">
    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search users...">
</form>

<table class="table table-bordered">
<thead>
<tr>
<th>No</th>
<th>Name</th>
<th>Email</th>
<th>Action</th>
</tr>
</thead>

<tbody>

@forelse($users as $u)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $u->name }}</td>
<td>{{ $u->email }}</td>

<td>
<a href="{{ route('users.edit',$u->id) }}" class="btn btn-warning btn-sm">Edit</a>

<form action="{{ route('users.destroy', $u->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button onclick="return confirm('Yakin hapus user ini?')" class="btn btn-danger btn-sm">
        Delete
    </button>
</form>
</td>

</tr>
@empty
<tr>
<td colspan="4" class="text-center">Belum ada data</td>
</tr>
@endforelse

</tbody>
</table>

<div class="mt-3">
    {{ $users->appends(request()->query())->links() }}
</div>

</div>
</div>

@endsection