<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spd extends Model
{
    protected $table = 'spd';

    protected $fillable = [
        'no_spd',
        'tgl_spd',
        'pb_perintah',
        'mata_anggaran',
        'tgl_berangkat',
        'tgl_kembali',
        'asal',
        'tujuan',
        'untuk',
        'ket',
        'instansi',
        'jns_transportasi',
        'id_pegawai',
    ];
    public function suratTugas()
    {
        return $this->belongsToMany(SuratTugas::class, 'surat_tugas_pegawai', 'pegawai_id', 'surat_tugas_id');
    }

    public function getFormattedNoSpd()
    {
        return sprintf('%03d', $this->id) . '/SPD/' . date('m', strtotime($this->tgl_spd)) . '/' . date('Y', strtotime($this->tgl_spd));
    }
    // Relasi ke Pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id');
    }
    public function daftarRiil()
{
    return $this->hasMany(DaftarRiil::class, 'id_spd', 'id_spd');
}

}
