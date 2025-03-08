<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarNominatif extends Model
{
    use HasFactory;

    protected $table = 'daftar_nominatif';

    protected $primaryKey = 'id_nominatif'; // Sesuaikan dengan primary key di database

    public $timestamps = true;

    protected $fillable = [
        'id_spd', 'id_pegawai', 'uang_harian', 'transportasi', 'penginapan', 'total'
    ];

    public function spd()
    {
        return $this->belongsTo(Spd::class, 'id_spd', 'id_spd');
    }

    public function pegawai()
{
    return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai'); // Sesuaikan dengan kolom di tabel pegawai
}

}

