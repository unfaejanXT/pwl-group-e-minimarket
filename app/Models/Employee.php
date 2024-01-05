<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'jabatan', 'phone_number','address','user_id','cabang_id'
        // Tambahkan kolom lain sesuai kebutuhan
    ];

    public function cabang()
    {
        return $this->belongsTo(Branch::class);
    }
}
