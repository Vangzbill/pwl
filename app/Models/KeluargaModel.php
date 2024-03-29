<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluargaModel extends Model
{
    use HasFactory;
    protected $table = 'keluarga';
    protected $primaryKey = 'nik';
    protected $keyType = 'string';

    protected $fillable = [
        'nik', 'nama',
        'agama', 'peran'
    ];
}
