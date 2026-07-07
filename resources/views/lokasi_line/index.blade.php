@extends('layout')

@section('content')

<div class="container-fluid px-4">

    <!-- HEADER + KPI -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Data Lokasi Line</h4>
            <small class="text-muted">Kelola semua line produksi</small>
        </div>
        <a href="{{ route('lokasi-line.create') }}" class="btn btn-primary shadow">
            <i class="fa fa-plus"></i> Tambah Line
        </a>
    </div>

    <!-- MINI STATS -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="mini-card shadow-sm">
                <small>Total Line</small>
                <h4>{{ count($lines) }}</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="mini-card shadow-sm">
                <small>Terakhir Update</small>
                <h6>{{ $lines->last()?->updated_at ?? '-' }}</h6>
            </div>
        </div>
    </div>

    <!-- TABLE CARD -->
    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body">

            <!-- TOOLBAR (ONLY SORT) -->
            <div class="d-flex justify-content-end mb-3">
                <select id="sortSelect" class="form-select w-auto">
                    <option value="">Urutkan</option>
                    <option value="asc">Nama A-Z</option>
                    <option value="desc">Nama Z-A</option>
                </select>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- TABLE -->
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="tableLine">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama Line</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($lines as $line)
                        <tr>
                            <td>{{ $line->id }}</td>

                            <td class="fw-semibold">
                                <i class="fa fa-industry text-primary"></i>
                                {{ $line->nama_line }}
                            </td>

                            <td>
                                {{ $line->deskripsi ?? '-' }}
                            </td>

                            <td class="text-center">
                                <a href="{{ route('lokasi-line.edit', $line->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('lokasi-line.destroy', $line->id) }}" method="POST" class="d-inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">
                                <i class="fa fa-database fa-2x text-muted"></i>
                                <p class="mt-2">Belum ada data line</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

@endsection

<!-- SORT SCRIPT -->
<script>
const sortSelect = document.getElementById("sortSelect");
const table = document.getElementById("tableLine");

sortSelect.addEventListener("change", function() {
    let rows = Array.from(table.querySelectorAll("tbody tr"));
    let asc = this.value === "asc";

    rows.sort((a, b) => {
        let A = a.children[1].innerText.toLowerCase();
        let B = b.children[1].innerText.toLowerCase();
        return asc ? A.localeCompare(B) : B.localeCompare(A);
    });

    rows.forEach(row => table.querySelector("tbody").appendChild(row));
});
</script>