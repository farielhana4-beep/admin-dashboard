@extends('admin.layouts.app')

@section('content')

<div class="card">
<div class="card-header">Edit User</div>

<div class="card-body">
<form action="{{ route('users.update',$user->id) }}" method="POST">
@csrf
@method('PUT')

<div class="form-group">
<label>Name</label>
<input type="text" name="name" value="{{ $user->name }}" class="form-control">
</div>

<div class="form-group">
<label>Email</label>
<input type="email" name="email" value="{{ $user->email }}" class="form-control">
</div>

<button class="btn btn-primary">Update</button>

</form>
</div>
</div>

@endsection