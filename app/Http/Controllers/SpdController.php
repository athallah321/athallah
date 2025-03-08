<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spd;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DaftarRiil;

class SpdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil parameter pencarian jika ada
        $search = $request->input('search');

        // Ambil data surat tugas, dengan pencarian nama pegawai jika ada
        $spds = Spd::when($search, function($query, $search) {
            return $query->where(function($query) use ($search) {
                $query->whereHas('pegawai', function ($query) use ($search) {
                    $query->where('nama', 'like', "%{$search}%")
                          ->orWhere('no_spd', 'like', "%{$search}%")
                          ->orWhere('tujuan', 'like', "%{$search}%")
                          ->orWhereDate('tgl_spd', 'like', "%{$search}%");
                        });
            });
        })
        ->latest()  // Mengurutkan berdasarkan 'created_at' terbaru
        ->paginate(10);  // Tentukan jumlah data per halaman
// Kirim data ke view
return view('spds.index', compact('spds'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function getSpd(Request $request)
    {
        if ($request->ajax()) {
            $data = Spd::select('id_spd', 'no_Spd', 'tgl_spd','pb_perintah','mata_anggaran','tgl_berangkat','tgl_kembali','asal','tujuan','untuk','ket','instansi','jns_transportasi', 'created_at');
            return DataTables::of($data)
                ->addIndexColumn() // Tambahkan index kolom otomatis
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action']) // Render kolom HTML
                ->make(true);
        }
    }
    public function create()
    {
        $pegawais = \App\Models\Pegawai::all();
        return view('spds.create', compact('pegawais')); // Mengarahkan ke form create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_spd' => 'required|unique:spd',
            'tgl_spd' => 'required|date',
            'pb_perintah' => 'required',
            'mata_anggaran' => 'required',
            'tgl_berangkat' => 'required|date',
            'tgl_kembali' => 'required|date',
            'asal' => 'required',
            'tujuan' => 'required',
            'untuk' => 'required',
            'instansi' => 'required',
            'ket' => 'nullable|string',
            'jns_transportasi' =>'required',
            'pegawai_id' => 'required|exists:pegawai,id',
        ]);

          // Ambil nomor urut terakhir
    $lastSpd = SPD::whereYear('tgl_spd', date('Y'))->orderBy('id', 'desc')->first();
    $newNumber = $lastSpd ? $lastSpd->id + 1 : 1;

         // Simpan data user baru
         Spd::create([
            'no_spd' => $request->no_spd,
            'tgl_spd' => $request->tgl_spd,
            'pb_perintah' => $request->pb_perintah,
            'mata_anggaran' => $request->mata_anggaran,
            'tgl_berangkat' => $request->tgl_berangkat,
            'tgl_kembali' => $request->tgl_kembali,
            'asal' => $request->asal,
            'tujuan' => $request->tujuan,
            'untuk' => $request->untuk,
            'instansi' => $request->instansi,
            'ket' => $request->ket,
            'jns_transportasi'=> $request->jns_transportasi,
            'pegawai_id' => $request->pegawai_id,

        ]);

        return redirect()->route('spds.index')->with('success', 'Data SPD berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $spds = Spd::with('pegawai')->findOrFail($id);

        return view('spds.show', compact('spds'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $spds = Spd::with('pegawai')->findOrFail($id); // Ambil SPD beserta pegawai
    $pegawais = \App\Models\Pegawai::all(); // Ambil daftar pegawai untuk dropdown

    return view('spds.edit', compact('spds', 'pegawais'));
}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $spds = Spd::findOrFail($id);
        $request->validate([
            'no_spd' => 'required|unique:spd,no_spd,' . $spds->id,
            'tgl_spd' => 'required|date',
            'pb_perintah' => 'required',
            'mata_anggaran' => 'required',
            'tgl_berangkat' => 'required|date',
            'tgl_kembali' => 'required|date',
            'asal' => 'required',
            'tujuan' => 'required',
            'untuk' => 'required',
            'instansi' => 'required',
            'jns_transportasi' =>'required',
            'ket' => 'nullable|string',
            'id_pegawai' => 'required|exists:pegawai,id',
        ]);
         // Cari user dan update data
    $spds = Spd::findOrFail($id);
    $spds->update([
            'no_spd' => $request->no_spd,
            'tgl_spd' => $request->tgl_spd,
            'pb_perintah' => $request->pb_perintah,
            'mata_anggaran' => $request->mata_anggaran,
            'tgl_berangkat' => $request->tgl_berangkat,
            'tgl_kembali' => $request->tgl_kembali,
            'asal' => $request->asal,
            'tujuan' => $request->tujuan,
            'untuk' => $request->untuk,
            'instansi' => $request->instansi,
            'jns_transportasi' =>$request->jns_transportasi,
            'ket' => $request->ket,
            'pegawai_id' => $request->pegawai_id,

    ]);

        return redirect()->route('spds.index')->with('success', 'Data SPD berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $spds = Spd::findOrFail($id);

        $spds->delete();
        return redirect()->route('spds.index')->with('success', 'Data SPD berhasil dihapus.');

    }
    public function generatePDF($id)
    {
        // Ambil data Surat Tugas berdasarkan ID
        $spds = Spd::with('pegawai')->findOrFail($id);

        // Ganti karakter yang tidak valid di nomor surat
        $noSpd = str_replace(['/', '\\'], '-', $spds->no_spd);

        // Kirim data ke view untuk PDF
        $pdf = PDF::loadView('spds.pdf', compact('spds'));

        // Tampilkan PDF di browser
        return $pdf->stream('Spd' . $noSpd . '.pdf');
    }


    }


