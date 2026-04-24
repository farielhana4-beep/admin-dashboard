@extends('admin.layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <h1>Contact</h1>
    </div>
</div>

<section class="content">
<div class="container-fluid">

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">
    <div class="card-body">

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf

            <label>Email</label>
            <input type="text" name="email" class="form-control mb-3"
                   value="{{ $contact->email ?? '' }}">

            <label>WhatsApp</label>
            <input type="text" name="whatsapp" class="form-control mb-3"
                   value="{{ $contact->whatsapp ?? '' }}">

            <label>Github</label>
            <input type="text" name="github" class="form-control mb-3"
                   value="{{ $contact->github ?? '' }}">

            <label>Instagram</label>
            <input type="text" name="instagram" class="form-control mb-3"
                   value="{{ $contact->instagram ?? '' }}">

            <button class="btn btn-success">💾 Simpan</button>

        </form>

    </div>
</div>

</div>
</section>

@endsection