<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai; // Model untuk tabel Pegawai
use App\Models\Spd;     // Model untuk tabel SPD
use App\Models\SuratTugas;      // Model untuk tabel ST
use App\Models\Kwitansi; // Model untuk tabel Kwitansi

class DashboardController extends Controller
{
    public function __construct()
    {
        // Middleware auth untuk melindungi rute dashboard
        $this->middleware('auth');
    }

    public function index()
    {
        // Menghitung jumlah data di masing-masing tabel
        $pegawaiCount = Pegawai::count();
        $spdCount = Spd::count();
        $surattugasCount = SuratTugas::count();
        // $kwitansiCount = Kwitansi::count();

        // Mengirimkan data ke view
        return view('layouts.dashboard', compact('pegawaiCount', 'spdCount', 'surattugasCount'));
    }
}
