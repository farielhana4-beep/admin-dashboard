@extends('admin.layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <h1>Experience</h1>
    </div>
</div>

<section class="content">
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
            + Tambah Experience
        </button>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="modalTambah">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('experiences.store') }}" method="POST">
                @csrf

                <div class="modal-content">

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title">Tambah Experience</h5>
                        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-6">
                                <label>Posisi</label>
                                <input type="text" name="position" class="form-control mb-3" required>

                                <label>Perusahaan</label>
                                <input type="text" name="company" class="form-control mb-3">

                                <label>Lokasi</label>
                                <input type="text" name="location" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Tahun Mulai</label>
                                <input type="number" name="start_year" class="form-control mb-3">

                                <label>Tahun Selesai</label>
                                <input type="number" name="end_year" class="form-control mb-3">

                                <div class="form-check">
                                    <input type="checkbox" name="is_current" class="form-check-input">
                                    <label class="form-check-label">Masih bekerja di sini</label>
                                </div>
                            </div>

                        </div>

                        <label class="mt-3">Deskripsi</label>
                        <textarea name="description" class="form-control"></textarea>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success">Simpan</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <!-- LIST -->
    <div class="card-body">
        <div class="timeline">

            @forelse($experiences as $exp)

            <div class="time-label">
                <span class="bg-info">
                    {{ $exp->start_year }} - 
                    {{ $exp->is_current ? 'Sekarang' : $exp->end_year }}
                </span>
            </div>

            <div>
                <i class="fas fa-briefcase bg-primary"></i>

                <div class="timeline-item">
                    <h3 class="timeline-header">
                        {{ $exp->position }} - <b>{{ $exp->company }}</b>
                    </h3>

                    <div class="timeline-body">
    <small class="text-muted d-block mb-2">
        📍 {{ $exp->location ?? '-' }}
    </small>

    {{ $exp->description }}
</div>

                    <div class="timeline-footer">
                        <a href="/experiences/{{ $exp->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                        <form action="/experiences/{{ $exp->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

            @empty
            <p class="text-center text-muted">Belum ada experience</p>
            @endforelse

        </div>
    </div>

</div>

</div>
</section>

@endsection