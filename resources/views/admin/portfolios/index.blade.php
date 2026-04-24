@extends('admin.layouts.app')

@php use Illuminate\Support\Str; @endphp

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">Portfolio</h1>
    </div>
</div>

<section class="content">
<div class="container-fluid">

<div class="card">

    <!-- BUTTON -->
    <div class="card-header">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
            + Tambah Portfolio
        </button>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="modalTambah">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-content">

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title">Tambah Portfolio</h5>
                        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row">

                            <!-- LEFT -->
                            <div class="col-md-6">
                                <label>Judul</label>
                                <input type="text" name="title" class="form-control mb-3" required>

                                <label>Deskripsi</label>
                                <textarea name="description" class="form-control mb-3"></textarea>

                                <label>Link Project</label>
                                <input type="text" name="link" class="form-control">
                            </div>

                            <!-- RIGHT -->
                            <div class="col-md-6">
                                <label>Upload Gambar</label>
                                <input type="file" name="image" class="form-control mb-2" onchange="previewImage(event)">
                                <img id="previewImg" class="img-fluid rounded d-none mb-3"/>

                                <label>Upload Video</label>
                                <input type="file" name="video" class="form-control">
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success">
                            💾 Simpan
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <!-- LIST -->
    <div class="card-body">

        <div class="row">

        @forelse($portfolios as $item)

        <div class="col-lg-4 col-md-6 mb-4 d-flex">
            <div class="card shadow-sm w-100 portfolio-card">

                <!-- MEDIA -->
                @if($item->video)
                    <video class="w-100" style="height:200px; object-fit:cover;" controls muted>
                        <source src="{{ asset('storage/' . $item->video) }}" type="video/mp4">
                    </video>
                @elseif($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" 
                         class="card-img-top" 
                         style="height:200px; object-fit:cover;">
                @endif

                <div class="card-body d-flex flex-column">

                    <h5 class="card-title mb-1">{{ $item->title }}</h5>

                    <p class="text-muted small mb-2">
                        {{ Str::limit($item->description, 60) }}
                    </p>

                    <!-- LINK -->
                    @if($item->link && Str::startsWith($item->link, ['http://','https://']))
                        <a href="{{ $item->link }}" target="_blank" class="btn btn-sm btn-outline-primary mb-2">
                            🔗 Lihat Project
                        </a>
                    @else
                        <small class="text-danger">Link tidak valid</small>
                    @endif

                    <!-- BUTTON -->
                    <div class="mt-auto d-flex justify-content-between">
                        <a href="/portfolios/{{ $item->id }}/edit" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="/portfolios/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </div>

                </div>

            </div>
        </div>

        @empty
        <div class="col-12 text-center">
            <p class="text-muted">Belum ada portfolio</p>
        </div>
        @endforelse

        </div>

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

<style>
.portfolio-card {
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.portfolio-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.2);
}
</style>
@endsection