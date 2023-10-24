<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class nama_guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', // Menambahkan atribut 'nama' ke dalam daftar fillable
        'mata_pelajaran',
        // Atribut lain yang perlu diisi secara massal
    ];

    protected $table = 'nama_gurus'; // Replace 'nama_guru' with your actual table name

    public function tugas():HasMany
    {
        return $this->hasMany(tugas::class);
    }
}
