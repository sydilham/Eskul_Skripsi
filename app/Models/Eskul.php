<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Contracts\Service\Attribute\Required;

class Eskul extends Model
{
    use HasFactory, SoftDeletes;

    // Define the fillable fields
    protected $fillable = [
        'nama_eskul',
        'tempat',
        'pembina',
        'jadwal',
    ];

    public function pendaftar()
{
    return $this->hasMany(PendaftaranEskul::class);
}
}
