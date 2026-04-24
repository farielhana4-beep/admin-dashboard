@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Profile</h3>
                </div>

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body text-center">

                        {{-- FOTO --}}
                        <div class="mb-3">
                            @if($user->photo)
                                <img src="{{ asset('storage/'.$user->photo) }}"
                                     style="width:120px;height:120px;border-radius:50%;object-fit:cover;">
                            @else
                                <div style="width:120px;height:120px;border-radius:50%;background:#6c757d;
                                            color:white;display:flex;align-items:center;justify-content:center;
                                            font-size:40px;margin:auto;">
                                    {{ strtoupper(substr($user->name,0,1)) }}
                                </div>
                            @endif
                        </div>

                        {{-- INPUT FOTO --}}
                        <div class="form-group text-left">
                            <label>Foto Profile</label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        {{-- NAME --}}
                        <div class="form-group text-left">
                            <label>Nama</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                        </div>

                        {{-- EMAIL --}}
                        <div class="form-group text-left">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                        </div>

                    </div>

                    <div class="card-footer d-flex justify-content-between">

    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <button class="btn btn-primary">
        <i class="fas fa-save"></i> Update Profile
    </button>

</div>

                </form>

            </div>

        </div>
    </div>

</div>

@endsection