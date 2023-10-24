<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class data_mapel extends Model
{
    use HasFactory;

    protected $table = 'data_mapel'; // Nama tabel dalam database

    protected $fillable = ['nama_mapel']; // Kolom yang dapat diisi
    //relasi
    public function tugas():HasMany
    {
        return $this->hasMany(tugas::class);
    }
}
