@extends('admin.layouts.app')

@section('title', 'Tambah Hero')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-dark text-white">
        <h3 class="card-title">Tambah Hero Section</h3>
    </div>

    <form action="{{ route('hero.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">

            {{-- IMAGE --}}
            <div class="form-group text-center mb-4">
                <label class="d-block mb-2">Foto Profile</label>

                <img id="preview"
                     src="https://via.placeholder.com/150"
                     style="width:150px;height:150px;border-radius:50%;object-fit:cover;border:3px solid #ddd;margin-bottom:10px;">

                <input type="file" name="image" class="form-control"
                       onchange="previewImage(event)">
            </div>

            {{-- HEADLINE --}}
            <div class="form-group">
                <label>Headline</label>
                <input type="text" name="headline" class="form-control"
                       placeholder="Contoh: Hi, I'm Faril 👋">
            </div>

            {{-- SUBHEADLINE --}}
            <div class="form-group">
                <label>Subheadline</label>
                <input type="text" name="subheadline" class="form-control"
                       placeholder="Web Developer | Laravel & React">
            </div>

            {{-- CTA TEXT --}}
            <div class="form-group">
                <label>Button Text</label>
                <input type="text" name="cta_text" class="form-control"
                       placeholder="View My Projects">
            </div>

            {{-- CTA LINK --}}
            <div class="form-group">
                <label>Button Link</label>
                <input type="text" name="cta_link" class="form-control"
                       placeholder="#projects">
            </div>

        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('hero.index') }}" class="btn btn-secondary">
                ← Kembali
            </a>

            <button class="btn btn-success">
                💾 Simpan Hero
            </button>
        </div>

    </form>

</div>

@endsection


@section('scripts')
<script>
function previewImage(event){
    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById('preview').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection