@extends('admin.layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <h1>About Me</h1>
    </div>
</div>

<section class="content">
<div class="container-fluid">

    {{-- SUCCESS ALERT --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    {{-- LEFT --}}
                    <div class="col-md-6">

                        <label>Nama</label>
                        <input type="text" name="name" class="form-control mb-3"
                               value="{{ $about->name ?? '' }}">

                        <label>Email</label>
                        <input type="text" name="email" class="form-control mb-3"
                               value="{{ $about->email ?? '' }}">

                        <label>WhatsApp</label>
                        <input type="text" name="whatsapp" class="form-control mb-3"
                               value="{{ $about->whatsapp ?? '' }}">

                        <label>Github</label>
                        <input type="text" name="github" class="form-control mb-3"
                               value="{{ $about->github ?? '' }}">

                    </div>

                    {{-- RIGHT --}}
                    <div class="col-md-6">

                        <label>Foto</label>

                        {{-- PREVIEW FOTO --}}
                        @if(!empty($about->photo))
                            <div class="mb-2">
                                <img src="{{ asset('storage/'.$about->photo) }}"
                                     style="width:100px;height:100px;border-radius:50%;object-fit:cover;">
                            </div>
                        @endif

                        <input type="file" name="photo" class="form-control mb-3">

                        <label>Bio</label>
                        <textarea name="bio" class="form-control" rows="6">{{ $about->bio ?? '' }}</textarea>

                    </div>

                </div>

                <button class="btn btn-success mt-3">
                    💾 Simpan
                </button>

            </form>

        </div>
    </div>

</div>
</section>

@endsection