<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportasi extends Model
{
    use HasFactory;

    protected $table = 'transportasi'; // Nama tabel
    protected $fillable = ['jenis_transportasi']; // Kolom yang dapat diisi
}
