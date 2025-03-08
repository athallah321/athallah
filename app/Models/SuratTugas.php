<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SuratTugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'pegawai_id',
        'no_surat',
        'tgl_surat',
        'tempat_berangkat',
        'tempat_tujuan',
        'tgl_berangkat',
        'tgl_kembali',
        'instansi',
        'untuk',
    ];
    public function sppd()
    {
        return $this->hasMany(spd::class, 'id_pegawai', 'pegawai_id');
    }

    // Otomatis generate UUID saat membuat data baru
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    // Relasi ke Pegawai (Many to Many)
    public function pegawai()
    {
        return $this->belongsToMany(Pegawai::class, 'surat_tugas_pegawai', 'surat_tugas_id', 'pegawai_id');
    }
}
