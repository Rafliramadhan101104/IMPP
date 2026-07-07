@extends('layout')

@section('content')

<div class="container-fluid px-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Data Masalah Produksi</h4>
            <small class="text-muted">Monitoring masalah di setiap line</small>
        </div>
        <a href="{{ route('produksi.create') }}" class="btn btn-danger shadow">
            <i class="fa fa-plus"></i> Tambah Masalah
        </a>
    </div>

    <!-- TABLE -->
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Line</th>
                            <th>Tanggal</th>
                            <th>Masalah</th>
                            <th>Status</th>
                            <th>PIC</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <!-- RELASI LINE -->
                            <td>
                                <span class="badge bg-primary">
                                    {{ $item->line->nama_line ?? '-' }}
                                </span>
                            </td>

                            <!-- TANGGAL -->
                            <td>{{ $item->tanggal }}</td>

                            <!-- MASALAH -->
                            <td class="fw-semibold">{{ $item->masalah }}</td>

                            <!-- STATUS -->
                            <td>
                                @if($item->status == 'Open')
                                    <span class="badge bg-danger">Open</span>
                                @else
                                    <span class="badge bg-success">Close</span>
                                @endif
                            </td>

                            <!-- PIC -->
                            <td>{{ $item->pic ?? '-' }}</td>

                            <!-- AKSI -->
                            <td class="text-center">
                                <a href="{{ route('produksi.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('produksi.destroy', $item->id) }}" method="POST" class="d-inline">
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
                            <td colspan="7" class="text-center py-4">
                                <i class="fa fa-database fa-2x text-muted"></i>
                                <p class="mt-2">Belum ada data masalah</p>
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