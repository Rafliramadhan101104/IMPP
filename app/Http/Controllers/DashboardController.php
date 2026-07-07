<?php

namespace App\Http\Controllers;

use App\Models\LokasiLine;
use App\Models\Produksi;
use App\Models\Tindakan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalLine' => LokasiLine::count(),
            'totalMasalah' => Produksi::count(),
            'totalTindakan' => Tindakan::count(),

            'masalahTerbaru' => Produksi::with('line')->latest()->take(5)->get(),
            'tindakanTerbaru' => Tindakan::with('produksi')->latest()->take(5)->get(),
        ]);
    }
}