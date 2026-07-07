@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Lokasi Line</h4>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('lokasi-line.store') }}">
            @csrf

            <div class="mb-3">
                <label>Nama Line</label>
                <input type="text" name="nama_line" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control"></textarea>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('lokasi-line.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection