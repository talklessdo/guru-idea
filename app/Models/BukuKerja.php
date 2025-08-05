<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuKerja extends Model
{
    /** @use HasFactory<\Database\Factories\BukuKerjaFactory> */
    use HasFactory;

    protected $table = 'buku_kerja';
    protected $fillable = [
        'nama_guru',
        'judul',
        'guru_id',
        'slug',
        'mata_pelajaran',
        'kelas',
        'indikator_id',
        'nama_file',
        'status',
        'kategori',
        'tp',
        'semester',
        'catatan',
    ];
}
