<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HobbyModel extends Model
{
    use HasFactory;
    protected $table = 'hobby';
    protected $fillable = [
        'nama', 'alasan'
    ];
}
