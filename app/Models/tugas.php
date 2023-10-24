<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas'; // Sesuaikan dengan nama tabel Anda

    protected $guarded=[

    ];

    public function nama_guru():BelongsTo
    {
        return $this->belongsTo(nama_guru::class, 'guru_id');
    }
    public function data_mapel(): BelongsTo
    {
        return $this->belongsTo(data_mapel::class, 'mapel_id');
    }

}
