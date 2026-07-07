@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Lokasi Line</h4>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('lokasi-line.update', $line->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Line</label>
                <input type="text" name="nama_line" class="form-control" value="{{ $line->nama_line }}" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control">{{ $line->deskripsi }}</textarea>
            </div>

            <button class="btn btn-warning">Update</button>
            <a href="{{ route('lokasi-line.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection