@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Produksi</h4>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('produksi.update', $prod->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Lokasi Line</label>
                <select name="line_id" class="form-control">
                    @foreach($lines as $line)
                        <option value="{{ $line->id }}" {{ $prod->line_id == $line->id ? 'selected' : '' }}>
                            {{ $line->nama_line }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $prod->tanggal }}">
            </div>

            <div class="mb-3">
                <label>Masalah</label>
                <textarea name="masalah" class="form-control">{{ $prod->masalah }}</textarea>
            </div>

            <div class="mb-3">
                <label>Tindakan</label>
                <textarea name="tindakan" class="form-control">{{ $prod->tindakan }}</textarea>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="Open" {{ $prod->status=='Open'?'selected':'' }}>Open</option>
                    <option value="Close" {{ $prod->status=='Close'?'selected':'' }}>Close</option>
                </select>
            </div>

            <div class="mb-3">
                <label>PIC</label>
                <input type="text" name="pic" class="form-control" value="{{ $prod->pic }}">
            </div>

            <button class="btn btn-warning">Update</button>
            <a href="{{ route('produksi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection