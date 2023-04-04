<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = [
        'nim', 'nama',
        'jk' , 'tempat_lahir',
        'tanggal_lahir', 'hp',
        'alamat'
    ];
}
