<?php

namespace App\Http\Controllers;

use App\Models\LokasiLine;
use Illuminate\Http\Request;

class LokasiLineController extends Controller
{
    public function index()
    {
        $lines = LokasiLine::all();
        return view('lokasi_line.index', compact('lines'));
    }

    public function create()
    {
        return view('lokasi_line.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_line' => 'required|max:100',
            'deskripsi' => 'nullable',
        ]);

        LokasiLine::create([
            'nama_line' => $request->nama_line,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('lokasi-line.index')
                         ->with('success', 'Data Line berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $line = LokasiLine::findOrFail($id);
        return view('lokasi_line.edit', compact('line'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_line' => 'required|max:100',
            'deskripsi' => 'nullable',
        ]);

        $line = LokasiLine::findOrFail($id);

        $line->update([
            'nama_line' => $request->nama_line,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('lokasi-line.index')
                         ->with('success', 'Data Line berhasil diupdate!');
    }

    public function destroy($id)
    {
        $line = LokasiLine::findOrFail($id);
        $line->delete();

        return redirect()->route('lokasi-line.index')
                         ->with('success', 'Data Line berhasil dihapus!');
    }
}