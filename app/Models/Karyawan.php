<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'jabatan',
        'alamat',
        'gaji',
        'departemen_id'
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }
}
