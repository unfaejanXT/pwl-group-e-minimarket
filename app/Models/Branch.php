<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'alamat',
        // Tambahkan kolom lain sesuai kebutuhan
    ];
}
