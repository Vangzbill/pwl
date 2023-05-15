<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = [
        'nim', 'nama', 'kelas_id',
        'jk' , 'tempat_lahir',
        'tanggal_lahir', 'hp',
        'alamat', 'foto'
    ];

    public function kelas(){
        return $this->belongsTo(KelasModel::class, 'kelas_id', 'kelas_id');
    }

    public function nilai_khs(){
        return $this->belongsTo(NilaiKhs::class);
    }
}
