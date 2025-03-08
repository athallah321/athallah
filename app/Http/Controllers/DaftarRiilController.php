<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarRiil;  // Pastikan model DaftarRiil sudah dibuat
use App\Models\Spd;  // Jika diperlukan untuk memilih data SPD
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

class DaftarRiilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $daftarRiils = DaftarRiil::with('spd.pegawai') // Pastikan relasi SPD dan Pegawai diambil
            ->when($search, function ($query, $search) {
                return $query->where('uraian', 'like', "%{$search}%")
                             ->orWhereHas('spd', function ($query) use ($search) {
                                 $query->where('no_spd', 'like', "%{$search}%")
                                       ->orWhere('tgl_spd', 'like', "%{$search}%")
                                       ->orWhereHas('pegawai', function ($query) use ($search) {
                                           $query->where('nama', 'like', "%{$search}%");
                                       });
                             });
            })
            ->latest()
            ->paginate(10);

        return view('daftar_riils.index', compact('daftarRiils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data SPD untuk dropdown
        $spds = Spd::all();

        return view('daftar_riils.create', compact('spds')); // Mengarahkan ke form create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_spd' => 'required|exists:spds,id_spd',  // Pastikan id_spd ada di tabel spds
            'uraian' => 'required|string',
            'jumlah' => 'required|integer',
            'satuan' => 'required|string',
            'harga_satuan' => 'required|numeric',
        ]);

        // Simpan data baru ke tabel daftar_riil
        DaftarRiil::create([
            'id_spd' => $request->id_spd,
            'uraian' => $request->uraian,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'harga_satuan' => $request->harga_satuan,
        ]);

        return redirect()->route('daftar-riils.index')->with('success', 'Data Daftar Riil berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $daftarRiil = DaftarRiil::with('spd')->findOrFail($id);

        return view('daftar_riils.show', compact('daftarRiil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $daftarRiil = DaftarRiil::findOrFail($id);
        $spds = Spd::all(); // Ambil daftar SPD untuk dropdown

        return view('daftar_riils.edit', compact('daftarRiil', 'spds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $daftarRiil = DaftarRiil::findOrFail($id);

        $request->validate([
            'id_spd' => 'required|exists:spds,id_spd',  // Pastikan id_spd ada di tabel spds
            'uraian' => 'required|string',
            'jumlah' => 'required|integer',
            'satuan' => 'required|string',
            'harga_satuan' => 'required|numeric',
        ]);

        // Update data Daftar Riil
        $daftarRiil->update([
            'id_spd' => $request->id_spd,
            'uraian' => $request->uraian,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'harga_satuan' => $request->harga_satuan,
        ]);

        return redirect()->route('daftar-riils.index')->with('success', 'Data Daftar Riil berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $daftarRiil = DaftarRiil::findOrFail($id);

        $daftarRiil->delete();

        return redirect()->route('daftar-riils.index')->with('success', 'Data Daftar Riil berhasil dihapus.');
    }

    /**
     * Generate PDF of the specified resource.
     */
    public function generatePDF($id)
    {
        // Ambil data Daftar Riil berdasarkan ID
        $daftarRiil = DaftarRiil::with('spd')->findOrFail($id);

        // Ganti karakter yang tidak valid di nomor SPD jika perlu
        $noSpd = str_replace(['/', '\\'], '-', $daftarRiil->spd->no_spd);

        // Kirim data ke view untuk PDF
        $pdf = PDF::loadView('daftar_riils.pdf', compact('daftarRiil'));

        // Tampilkan PDF di browser
        return $pdf->stream('DaftarRiil-' . $noSpd . '.pdf');
    }
}
