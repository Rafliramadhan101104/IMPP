@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Data Produksi</h4>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('produksi.store') }}">
            @csrf

            <div class="mb-3">
                <label>Lokasi Line</label>
                <select name="line_id" class="form-control" required>
                    <option value="">-- Pilih Line --</option>
                    @foreach($lines as $line)
                        <option value="{{ $line->id }}">{{ $line->nama_line }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Masalah</label>
                <textarea name="masalah" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label>Tindakan</label>
                <textarea name="tindakan" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="Open">Open</option>
                    <option value="Close">Close</option>
                </select>
            </div>

            <div class="mb-3">
                <label>PIC</label>
                <input type="text" name="pic" class="form-control">
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('produksi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection