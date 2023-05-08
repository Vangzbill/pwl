<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;

class KelasModel extends Model
{
    use HasFactory;
    protected $table = 'kelas';

    protected $fillable = [
        'kelas_id', 'nama_kelas'
    ];

    public function mahasiswa(){
        return $this->hasMany(MahasiswaModel::class, 'kelas_id', 'kelas_id');
    }
}
