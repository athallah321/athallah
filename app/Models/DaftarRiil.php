<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarRiil extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang digunakan jika tidak sesuai dengan konvensi plural Laravel
    protected $table = 'daftar_riil';

    // Tentukan kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'id_spd', // Relasi dengan tabel SPD
        'uraian',
        'jumlah',
        'satuan',
        'harga_satuan',
    ];

    /**
     * Relasi dengan tabel SPD
     */
    public function spd()
    {
        return $this->belongsTo(Spd::class, 'id_spd', 'id_spd');
    }

    /**
     * Menghitung total harga (jumlah * harga_satuan)
     */
    public function getTotalAttribute()
    {
        return $this->jumlah * $this->harga_satuan;
    }
}
