<?php

namespace App\Http\Controllers;

use App\Models\Transportasi;
use Illuminate\Http\Request;

class TransportasiController extends Controller
{
    public function index()
    {
        $dataTransportasi = Transportasi::all(); // Mengambil semua data transportasi
        return view('transportasis.index', compact('dataTransportasi'));
    }

    public function create()
    {
        return view('transportasis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_transportasi' => 'required|string|max:255',
        ]);

        Transportasi::create($request->all());
        return redirect()->route('transportasis.index')->with('success', 'Data transportasi berhasil ditambahkan!');
    }
    public function edit($id)
{
    $transportasi = Transportasi::findOrFail($id); // Cari data berdasarkan ID
    return view('transportasis.edit', compact('transportasi'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'jenis_transportasi' => 'required|string|max:255',
    ]);

    $transportasi = Transportasi::findOrFail($id); // Cari data berdasarkan ID
    $transportasi->update($request->all()); // Update data dengan input dari user

    return redirect()->route('transportasis.index')->with('success', 'Data transportasi berhasil diperbarui!');
}

public function destroy($id)
{
    $transportasi = Transportasi::findOrFail($id); // Cari data berdasarkan ID
    $transportasi->delete(); // Hapus data

    return redirect()->route('transportasis.index')->with('success', 'Data transportasi berhasil dihapus!');
}

}
