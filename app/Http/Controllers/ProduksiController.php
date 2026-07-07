<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Models\LokasiLine;
use Illuminate\Http\Request;

class ProduksiController extends Controller
{
    public function index()
    {
        $data = Produksi::with('line')->get();
        return view('produksi.index', compact('data'));
    }

    public function create()
    {
        $lines = LokasiLine::all();
        return view('produksi.create', compact('lines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'line_id' => 'required',
            'tanggal' => 'required|date',
            'masalah' => 'required',
        ]);

        Produksi::create($request->all());

        return redirect()->route('produksi.index')
                         ->with('success', 'Masalah produksi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $prod = Produksi::findOrFail($id);
        $lines = LokasiLine::all();

        return view('produksi.edit', compact('prod', 'lines'));
    }

    public function update(Request $request, $id)
    {
        $prod = Produksi::findOrFail($id);

        $prod->update($request->all());

        return redirect()->route('produksi.index')
                         ->with('success', 'Data produksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Produksi::destroy($id);

        return redirect()->route('produksi.index')
                         ->with('success', 'Data produksi berhasil dihapus!');
    }
}