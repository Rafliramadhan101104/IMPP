<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use App\Models\Produksi;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    public function index()
    {
        $data = Tindakan::with('produksi')->latest()->get();
        return view('tindakan.index', compact('data'));
    }

    public function create()
    {
        $produksi = Produksi::all();
        return view('tindakan.create', compact('produksi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produksi_id' => 'required|exists:produksi,id',
            'tindakan' => 'required',
            'tanggal' => 'required|date',
            'pic' => 'required|max:100'
        ]);

        Tindakan::create([
            'produksi_id' => $request->produksi_id,
            'tindakan' => $request->tindakan,
            'tanggal' => $request->tanggal,
            'pic' => $request->pic,
        ]);

        return redirect()->route('tindakan.index')
            ->with('success', 'Tindakan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $tindakan = Tindakan::findOrFail($id);
        $produksi = Produksi::all();

        return view('tindakan.edit', compact('tindakan', 'produksi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'produksi_id' => 'required|exists:produksi,id',
            'tindakan' => 'required',
            'tanggal' => 'required|date',
            'pic' => 'required|max:100'
        ]);

        $tindakan = Tindakan::findOrFail($id);

        $tindakan->update([
            'produksi_id' => $request->produksi_id,
            'tindakan' => $request->tindakan,
            'tanggal' => $request->tanggal,
            'pic' => $request->pic,
        ]);

        return redirect()->route('tindakan.index')
            ->with('success', 'Tindakan berhasil diupdate!');
    }

    public function destroy($id)
    {
        Tindakan::destroy($id);

        return redirect()->route('tindakan.index')
            ->with('success', 'Tindakan berhasil dihapus!');
    }
}