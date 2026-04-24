@extends('admin.layouts.app')

@section('title', 'Hero Section')

@section('content')

<a href="{{ route('hero.create') }}" class="btn btn-primary mb-3">
    Edit Hero
</a>

<div class="card">
    <div class="card-header bg-primary d-flex justify-content-between">
        <h3 class="card-title">Hero Section</h3>
    </div>

<a href="{{ route('hero.create') }}" class="btn btn-primary">
    + Tambah Hero
</a>

    <div class="card-body">

        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('hero.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- IMAGE --}}
            <div class="form-group text-center">
                <img src="{{ isset($hero) && $hero->image ? asset('storage/'.$hero->image) : 'https://via.placeholder.com/150' }}"
                     style="width:120px;height:120px;border-radius:50%;object-fit:cover;margin-bottom:10px;">
                
                <input type="file" name="image" class="form-control mt-2">
            </div>

            {{-- HEADLINE --}}
            <div class="form-group">
                <label>Headline</label>
                <input type="text" name="headline" class="form-control"
                       value="{{ $hero->headline ?? '' }}">
            </div>

            {{-- SUBHEADLINE --}}
            <div class="form-group">
                <label>Subheadline</label>
                <input type="text" name="subheadline" class="form-control"
                       value="{{ $hero->subheadline ?? '' }}">
            </div>

            {{-- CTA --}}
            <div class="form-group">
                <label>Button Text</label>
                <input type="text" name="cta_text" class="form-control"
                       value="{{ $hero->cta_text ?? '' }}">
            </div>

            <button class="btn btn-primary mt-2">
                <i class="fas fa-save"></i> Simpan
            </button>

        </form>

    </div>
</div>

@endsection