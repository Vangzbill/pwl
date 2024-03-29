<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatkulModel extends Model
{
    use HasFactory;
    protected $table = 'matkul';

    protected $fillable = [
        'nama_matkul', 'sks', 'dosen', 'jam'
    ];

    public function nilai_khs(){
        return $this->hasMany(NilaiKhs::class);
    }
}
