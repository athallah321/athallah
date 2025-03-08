<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = "pegawai";
    protected $fillable = ['nip', 'nama', 'jabatan', 'pangkat', 'golongan_id', 'uuid'];

    // Relasi ke SuratTugas
    public function suratTugas()
    {
        return $this->belongsToMany(SuratTugas::class, 'surat_tugas_pegawai', 'pegawai_id', 'surat_tugas_id');
    }

    // Relasi ke Golongan
    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }

    // Tambahkan UUID secara otomatis saat model dibuat
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString(); // Buat UUID otomatis
        });
    }
}
