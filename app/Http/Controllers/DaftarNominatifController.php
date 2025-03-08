<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarNominatif;
use App\Models\Spd;
use App\Models\Pegawai;

class DaftarNominatifController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Ambil data SPD dan Pegawai untuk dropdown
        $spds = Spd::all();
        $pegawais = Pegawai::all();

        // Query daftar nominatif
        $daftarNominatif = DaftarNominatif::with(['spd', 'pegawai'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('pegawai', function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%");
                });
            })
            ->paginate(10);

        // Kirim data ke view
        return view('daftar_nominatif.index', compact('daftarNominatif', 'spds', 'pegawais'));
    }


    public function create()
    {
        $spds = Spd::all();
        $pegawais = Pegawai::all();

        return view('daftar_nominatif.create', compact('spds', 'pegawais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_spd' => 'required|exists:spd,id_spd',
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
            'uang_harian' => 'required|numeric',
            'transportasi' => 'required|numeric',
            'penginapan' => 'required|numeric'
        ]);

        DaftarNominatif::create($request->all());

        return redirect()->route('daftar_nominatif.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $nominatif = DaftarNominatif::findOrFail($id);
        $spds = Spd::all();
        $pegawais = Pegawai::all();

        return view('daftar_nominatif.edit', compact('nominatif', 'spds', 'pegawais'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_spd' => 'required|exists:spd,id_spd',
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
            'uang_harian' => 'required|numeric',
            'transportasi' => 'required|numeric',
            'penginapan' => 'required|numeric'
        ]);

        $nominatif = DaftarNominatif::findOrFail($id);
        $nominatif->update($request->all());

        return redirect()->route('daftar_nominatif.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $nominatif = DaftarNominatif::findOrFail($id);
        $nominatif->delete();

        return redirect()->route('daftar_nominatif.index')->with('success', 'Data berhasil dihapus.');
    }
    public function storeInline(Request $request)
{
    $request->validate([
        'id_spd' => 'required|exists:spd,id_spd',
        'id_pegawai' => 'required|exists:pegawai,id_pegawai',
        'uang_harian' => 'required|numeric',
        'transportasi' => 'required|numeric',
        'penginapan' => 'required|numeric'
    ]);

    DaftarNominatif::create($request->all());

    return redirect()->route('daftar_nominatif.index')->with('success', 'Data berhasil ditambahkan.');
}

}
