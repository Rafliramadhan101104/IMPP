<!DOCTYPE html>
<html>
<head>
    <title>Sistem Produksi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: #eef2f7;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(180deg, #0d6efd, #1e3c72);
            color: white;
            padding-top: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.2);
        }

        .sidebar .active {
            background: rgba(255,255,255,0.3);
        }

        /* CONTENT */
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .sidebar a i {
         margin-right: 10px;
        }

        .sidebar a:hover {
         padding-left: 25px;
        }
        /* HEADER */
.header-box {
    background: linear-gradient(135deg, #0d6efd, #1e3c72);
    border-radius: 20px;
}

/* CARD UTAMA */
.stat-card {
    background: linear-gradient(135deg, #4e73df, #224abe) !important;
    border-radius: 18px;
    color: white;
}

/* MERAH */
.stat-card-danger {
    background: linear-gradient(135deg, #ff416c, #ff4b2b) !important;
    border-radius: 18px;
    color: white;
}

/* HIJAU */
.stat-card-success {
    background: linear-gradient(135deg, #00c9ff, #92fe9d) !important;
    border-radius: 18px;
    color: white;
}
.table-hover tbody tr:hover {
    background-color: #f1f5ff;
}
.mini-card {
    background: white;
    padding: 15px;
    border-radius: 12px;
    text-align: center;
    transition: 0.3s;
}

.mini-card:hover {
    transform: translateY(-4px);
}

.table-hover tbody tr:hover {
    background-color: #f1f5ff;
}
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4 class="text-center mb-4">🏭 NaraPPondesen</h4>

    <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
        <i class="fa-solid fa-gauge"></i> Dashboard
    </a>

    <a href="{{ route('lokasi-line.index') }}" class="{{ request()->is('lokasi-line*') ? 'active' : '' }}">
        <i class="fa-solid fa-industry"></i> Data Line
    </a>

    <a href="{{ route('produksi.index') }}" class="{{ request()->is('produksi*') ? 'active' : '' }}">
        <i class="fa-solid fa-triangle-exclamation"></i> Masalah
    </a>

    <a href="{{ route('tindakan.index') }}" class="{{ request()->is('tindakan*') ? 'active' : '' }}">
        <i class="fa-solid fa-screwdriver-wrench"></i> Tindakan
    </a>
</div>

<!-- CONTENT -->
<div class="content">
    @yield('content')
</div>

</body>
</html>
