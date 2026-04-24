@extends('admin.layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <h1>Edit Portfolio</h1>
    </div>
</div>

<section class="content">
<div class="container-fluid">

<div class="card">
<div class="card-body">

<form action="/portfolios/{{ $portfolio->id }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="row">

    <!-- LEFT -->
    <div class="col-md-6">

        <label>Judul</label>
        <input type="text" name="title" value="{{ $portfolio->title }}" class="form-control mb-3">

        <label>Deskripsi</label>
        <textarea name="description" class="form-control mb-3">{{ $portfolio->description }}</textarea>

        <label>Link</label>
        <input type="text" name="link" value="{{ $portfolio->link }}" class="form-control mb-3">

    </div>

    <!-- RIGHT -->
    <div class="col-md-6">

        <!-- IMAGE -->
        <label>Gambar Saat Ini</label><br>
        @if($portfolio->image)
            <img src="{{ asset('storage/' . $portfolio->image) }}" width="150" class="mb-2 rounded">
        @else
            <p class="text-muted">Belum ada gambar</p>
        @endif

        <label>Ganti Gambar</label>
        <input type="file" name="image" class="form-control mb-3" onchange="previewImage(event)">
        <img id="previewImg" class="img-fluid d-none mb-3"/>

        <!-- VIDEO -->
        <label>Video Saat Ini</label><br>
        @if($portfolio->video)
            <video width="200" controls class="mb-2">
                <source src="{{ asset('storage/' . $portfolio->video) }}">
            </video>
        @else
            <p class="text-muted">Belum ada video</p>
        @endif

        <label>Ganti Video</label>
        <input type="file" name="video" class="form-control">

    </div>

</div>

<button class="btn btn-success mt-3">💾 Update</button>

</form>

</div>
</div>

</div>
</section>

@endsection


@section('scripts')
<script>
function previewImage(event) {
    const img = document.getElementById('previewImg');
    img.src = URL.createObjectURL(event.target.files[0]);
    img.classList.remove('d-none');
}
</script>
@endsection