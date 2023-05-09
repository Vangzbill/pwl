<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKhs extends Model
{
    use HasFactory;
    protected $table = 'nilai_khs';

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class);
    }

    public function matakuliah()
    {
        return $this->belongsTo(MatkulModel::class, 'matkul_id', 'id');
    }
}
