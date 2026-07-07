@extends('layout')

@section('content')

<div class="container-fluid px-4">

    <!-- HEADER -->
    <div class="p-4 mb-4 text-white rounded-4 shadow header-box">
        <h2 class="fw-bold mb-1">PT NaraPPondesen</h2>
        <small>Sistem Monitoring Masalah Produksi</small>
    </div>

    <!-- STATISTIK -->
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="card stat-card text-white border-0 shadow h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small>Total Line</small>
                        <h2 class="mb-0">{{ $totalLine ?? 0 }}</h2>
                    </div>
                    <i class="fa-solid fa-industry fa-2x"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card stat-card-danger text-white border-0 shadow h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small>Total Masalah</small>
                        <h2 class="mb-0">{{ $totalMasalah ?? 0 }}</h2>
                    </div>
                    <i class="fa-solid fa-triangle-exclamation fa-2x"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card stat-card-success text-white border-0 shadow h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small>Total Tindakan</small>
                        <h2 class="mb-0">{{ $totalTindakan ?? 0 }}</h2>
                    </div>
                    <i class="fa-solid fa-screwdriver-wrench fa-2x"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- DATA TERBARU -->
    <div class="row g-4">

        <!-- MASALAH -->
        <div class="col-md-6">
            <div class="card shadow border-0 rounded-4 h-100">
                <div class="card-header bg-primary text-white fw-bold">
                    🔥 Masalah Terbaru
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @forelse($masalahTerbaru as $m)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $m->masalah }}</span>
                                <span class="badge bg-danger">Problem</span>
                            </li>
                        @empty
                            <li class="list-group-item text-center">Belum ada data</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <!-- TINDAKAN -->
        <div class="col-md-6">
            <div class="card shadow border-0 rounded-4 h-100">
                <div class="card-header bg-dark text-white fw-bold">
                    🛠 Tindakan Terbaru
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @forelse($tindakanTerbaru as $t)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $t->tindakan }}</span>
                                <span class="badge bg-success">Done</span>
                            </li>
                        @empty
                            <li class="list-group-item text-center">Belum ada data</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection