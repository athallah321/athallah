<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Yajra\DataTables\Facades\DataTables;
use Ramsey\Uuid\Uuid;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Ambil parameter pencarian jika ada
    $search = $request->input('search');

    // Ambil data pegawai, dengan filter pencarian jika ada
    $pegawais = Pegawai::when($search, function($query, $search) {
        return $query->where('nama', 'like', "%{$search}%")
                     ->orWhere('nip', 'like', "%{$search}%")
                     ->orWhere('jabatan', 'like', "%{$search}%")
                     ->orWhereDate('pangkat', 'like', "%{$search}%");
    })
    ->latest() // Urutkan berdasarkan data terbaru
    ->paginate(10); // Pagination dengan 10 item per halaman

    // Kirim data ke view
    return view('pegawais.index', compact('pegawais'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function getPegawais(Request $request)
    {
        if ($request->ajax()) {
            $data = Pegawai::select('id', 'nip', 'nama', 'jabatan','pangkat','golongan', 'created_at');
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

    public function getPegawai($uuid)
    {
        $pegawai = Pegawai::where('uuid', $uuid)->firstOrFail();


        if ($pegawai) {
            return response()->json([
                'success' => true,
                'data' => $pegawai
            ]);
        } else {
            return response()->json([
                'success' => false,
                 'message' => 'Pegawai tidak ditemukan'
            ], 404);
        }
    }

    public function create()
    {
        $golongans = \App\Models\Golongan::All();
        return view('pegawais.create', compact('golongans')); // Kirim data ke view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'pangkat' => 'required|string|max:255',
            'golongan_id' => 'required|exists:golongan,id', // Gunakan golongan_id
        ]);
        // Simpan data user baru
        Pegawai::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'pangkat' => $request->pangkat,
            'golongan_id' => $request->golongan_id, // Pastikan hanya pakai golongan_id
        ]);

        return redirect()->route('pegawais.index')->with('success', 'Data Pegawai berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        $pegawai = Pegawai::where('uuid', $uuid)->firstOrFail();

        if ($pegawai) {
            return response()->json([
                'pangkat' => $pegawai->pangkat,
                'golongan' => $pegawai->golongan,
                'nip' => $pegawai->nip,
            ]);
        }
        return response()->json([], 404); // Jika pegawai tidak ditemukan
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $pegawai = Pegawai::where('uuid', $uuid)->firstOrFail();

        $golongans = \App\Models\Golongan::All();
        return view('pegawais.edit', compact('pegawai', 'golongans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
         // Validasi input
    $request->validate([
        'nip' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'pangkat' => 'required|string|max:255',
        'golongan_id' => 'required|exists:golongan,id',
    ]);

    // Cari user dan update data
    $pegawai = Pegawai::where('uuid', $uuid)->firstOrFail();

    $pegawai->update([
        'nama' => $request->nama,
        'nip' => $request->nip,
        'jabatan' => $request->jabatan,
        'pangkat' => $request->pangkat,
        'golongan_id' => $request->golongan_id,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('pegawais.index')->with('success', 'Data Pegawai berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $pegawai = Pegawai::where('uuid', $uuid)->firstOrFail();

        $pegawai->delete(); // Hapus pegawai

        return redirect()->route('pegawais.index')->with('success', 'Data Pegawai berhasil dihapus');
        return redirect()->route('pegawais.index')->with('error', 'Data pegawai tidak ditemukan.');
    }

}
