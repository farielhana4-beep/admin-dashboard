@extends('admin.layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <h1>Skills</h1>
    </div>
</div>

<section class="content">
<div class="container-fluid">

<div class="card">
    <div class="card-body">

        {{-- FORM TAMBAH SKILL --}}
        <form action="{{ route('skills.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-5">
                    <input type="text" name="name" placeholder="Skill (contoh: Laravel)" class="form-control">
                </div>

                <div class="col-md-5">
                    <input type="number" name="percentage" placeholder="%" class="form-control">
                </div>

                <div class="col-md-2">
                    <button class="btn btn-success w-100">Tambah</button>
                </div>
            </div>
        </form>

        <hr>

        {{-- LIST SKILL --}}
        @php
            $colors = ['bg-success', 'bg-info', 'bg-warning', 'bg-danger'];
        @endphp

        @foreach($skills as $skill)
            @php
                $color = $colors[array_rand($colors)];
                $width = $skill->percentage . '%';
            @endphp

            <div class="mb-4">

                <div class="d-flex justify-content-between">
                    <strong>{{ $skill->name }}</strong>
                    <span>{{ $skill->percentage }}%</span>
                </div>

                <div class="progress mb-2">
                    <div class="progress-bar {{ $color }} progress-bar-striped progress-bar-animated"
                         style="width: {{ $width }};">
                    </div>
                </div>

                {{-- DELETE --}}
                <form action="{{ route('skills.destroy', $skill->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>

            </div>
        @endforeach

    </div>
</div>

</div>
</section>

@endsection