@extends('layout')

@section('content')

<div class="container-fluid px-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Data Tindakan</h4>
            <small class="text-muted">Monitoring tindakan dari setiap masalah</small>
        </div>
        <a href="{{ route('tindakan.create') }}" class="btn btn-primary shadow">
            <i class="fa fa-plus"></i> Tambah Tindakan
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
                            <th>Masalah</th>
                            <th>Tindakan</th>
                            <th>Tanggal</th>
                            <th>PIC</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <!-- RELASI MASALAH -->
                            <td>
                                <span class="badge bg-danger">
                                    {{ $item->produksi->masalah ?? '-' }}
                                </span>
                            </td>

                            <!-- TINDAKAN -->
                            <td class="fw-semibold">
                                {{ $item->tindakan }}
                            </td>

                            <!-- TANGGAL -->
                            <td>
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                            </td>

                            <!-- PIC -->
                            <td>{{ $item->pic ?? '-' }}</td>

                            <!-- AKSI -->
                            <td class="text-center">
                                <a href="{{ route('tindakan.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('tindakan.destroy', $item->id) }}" method="POST" class="d-inline">
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
                            <td colspan="6" class="text-center py-4">
                                <i class="fa fa-database fa-2x text-muted"></i>
                                <p class="mt-2">Belum ada data tindakan</p>
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