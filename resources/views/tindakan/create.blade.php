<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tindakan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Tambah Tindakan</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('tindakan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Masalah Produksi</label>
                    <select name="produksi_id" class="form-control">
                        @foreach($produksi as $p)
                            <option value="{{ $p->id }}">{{ $p->masalah }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Tindakan</label>
                    <input type="text" name="tindakan" class="form-control" placeholder="Masukkan tindakan">
                </div>

                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control">
                </div>

                <div class="mb-3">
                    <label>PIC</label>
                    <input type="text" name="pic" class="form-control" placeholder="Penanggung jawab">
                </div>

                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('tindakan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>