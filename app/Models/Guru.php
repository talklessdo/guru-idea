<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Guru extends Model
{
    /** @use HasFactory<\Database\Factories\GuruFactory> */
    use HasFactory;

    protected $guarded = [];

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'nik',
    //     'nuptk',
    //     'status_pegawai',
    //     'nip',
    //     'jk',
    //     'tempat_lahir',
    //     'tanggal_lahir',
    //     'nomor_hp',
    //     'tugas',
    //     'mata_pelajaran',
    //     'penempatan',
    //     'total_jtm',
    // ];

    protected $table = 'guru';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
