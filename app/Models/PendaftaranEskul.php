<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendaftaranEskul extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'eskul_id',
        'user_id',
        'no_telepon',
        'nama',
        'nisn',
        'kelas',
        'tgl_lahir',
        'jenis_kelamin'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eskul()
    {
        return $this->belongsTo(Eskul::class, 'eskul_id', 'id');
    }
}
