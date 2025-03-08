<?php

namespace App\Http\Controllers;

use App\Models\Spd;
use App\Models\SuratTugas;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use Ramsey\Uuid\Uuid;
use App\Models\SPPD;

class SuratTugasController extends Controller
{
    /**
     * Menampilkan daftar Surat Tugas.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $suratTugas = SuratTugas::when($search, function($query, $search) {
            return $query->where('no_surat', 'like', "%{$search}%")
                         ->orWhere('tempat_tujuan', 'like', "%{$search}%")
                         ->orWhereDate('tgl_surat', $search)
                         ->orWhereHas('pegawai', function ($query) use ($search) {
                             $query->where('nama', 'like', "%{$search}%");
                         });
        })->latest()->paginate(10);

        return view('surat_tugas.index', compact('suratTugas'));
    }

    /**
     * Mengambil data Surat Tugas untuk DataTables.
     */
    public function getSuratTugas(Request $request)
    {
        if ($request->ajax()) {
            $data = SuratTugas::select('uuid', 'no_surat', 'tgl_surat', 'tempat_berangkat', 'tempat_tujuan', 'tgl_berangkat', 'tgl_kembali', 'created_at');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('surat_tugas.edit', $row->uuid) . '" class="btn btn-primary btn-sm">Edit</a>
                            <a href="javascript:void(0)" class="delete btn btn-danger btn-sm" data-id="' . $row->uuid . '">Delete</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Menampilkan form buat Surat Tugas baru.
     */
    public function create()
    {
        $pegawais = \App\Models\Pegawai::all();
        return view('surat_tugas.create', compact('pegawais'));
    }

    /**
     * Menyimpan data Surat Tugas ke database.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'no_surat' => 'required|unique:surat_tugas,no_surat',
        'pegawai_id' => 'required|array',
        'pegawai_id.*' => 'exists:pegawai,id',
        'tgl_surat' => 'required|date',
        'tempat_berangkat' => 'required|string',
        'tempat_tujuan' => 'required|string',
        'instansi' => 'required|string',
        'untuk' => 'required|string',
        'tgl_berangkat' => 'required|date',
        'tgl_kembali' => 'required|date|after_or_equal:tgl_berangkat',
    ]);

    // Simpan Surat Tugas
    $suratTugas = SuratTugas::create([
        'uuid' => Uuid::uuid4()->toString(),
        'no_surat' => $validated['no_surat'],
        'tgl_surat' => $validated['tgl_surat'],
        'tempat_berangkat' => $validated['tempat_berangkat'],
        'tempat_tujuan' => $validated['tempat_tujuan'],
        'instansi' => $validated['instansi'],
        'untuk' => $validated['untuk'],
        'tgl_berangkat' => $validated['tgl_berangkat'],
        'tgl_kembali' => $validated['tgl_kembali'],
    ]);

    // Hubungkan pegawai dengan Surat Tugas
    $suratTugas->pegawai()->sync($validated['pegawai_id']);

    foreach ($validated['pegawai_id'] as $id_pegawai) {

        Spd::create([
            'no_spd' => 'SPD-' . now()->format('Ymd') . '-' . $id_pegawai,
            'tgl_spd' => now(),
            'pb_perintah' => auth()->user()->name,
            'mata_anggaran' => 'Default',
            'tgl_berangkat' => $validated['tgl_berangkat'],
            'tgl_kembali' => $validated['tgl_kembali'],
            'asal' => $validated['tempat_berangkat'],
            'tujuan' => $validated['tempat_tujuan'],
            'untuk' => $validated['untuk'],
            'ket' => 'Dibuat otomatis dari Surat Tugas',
            'instansi' => $validated['instansi'],
            'jns_transportasi' => 'Darat',
            'id_pegawai' => $id_pegawai, // Cek apakah ini null
        ]);
    }


    return redirect()->route('surat_tugas.index')->with('success', 'Surat Tugas dan SPPD berhasil dibuat.');
}


    /**
     * Menampilkan detail Surat Tugas tertentu.
     */
    public function show(string $uuid)
    {
        $suratTugas = SuratTugas::with('pegawai')->where('uuid', $uuid)->firstOrFail();
        return view('surat_tugas.show', compact('suratTugas'));
    }

    /**
     * Menampilkan form edit Surat Tugas.
     */
    public function edit(string $uuid)
    {
        $suratTugas = SuratTugas::where('uuid', $uuid)->firstOrFail();
        $pegawais = \App\Models\Pegawai::all();
        return view('surat_tugas.edit', compact('suratTugas', 'pegawais'));
    }

    /**
     * Mengupdate Surat Tugas di database.
     */
    public function update(Request $request, string $uuid)
    {
        $validated = $request->validate([
            'pegawai_id' => 'required|array',
            'pegawai_id.*' => 'exists:pegawai,id',
            'no_surat' => 'required|string|max:255|unique:surat_tugas,no_surat,' . $uuid . ',uuid',
            'tgl_surat' => 'required|date',
            'tempat_berangkat' => 'required|string|max:255',
            'tempat_tujuan' => 'required|string|max:255',
            'tgl_berangkat' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_berangkat',
            'instansi' => 'required|string|max:255',
            'untuk' => 'required|string|max:255',
        ]);

        $suratTugas = SuratTugas::where('uuid', $uuid)->firstOrFail();
        $suratTugas->pegawai()->sync($validated['pegawai_id']);

        return redirect()->route('surat_tugas.index')->with('success', 'Data Surat Tugas berhasil diperbarui.');
    }

    /**
     * Menghapus Surat Tugas.
     */
    public function destroy(string $uuid)
    {
        $suratTugas = SuratTugas::where('uuid', $uuid)->firstOrFail();
        $suratTugas->delete();

        return redirect()->route('surat_tugas.index')->with('success', 'Data Surat Tugas berhasil dihapus.');
    }

    /**
     * Generate PDF Surat Tugas.
     */
    public function generatePDF(string $uuid)
    {
        $suratTugas = SuratTugas::with('pegawai')->where('uuid', $uuid)->firstOrFail();
        $noSurat = str_replace(['/', '\\'], '-', $suratTugas->no_surat);
        $pdf = PDF::loadView('surat_tugas.pdf', compact('suratTugas'));

        return $pdf->stream('Surat_Tugas_' . $noSurat . '.pdf');
    }
}
