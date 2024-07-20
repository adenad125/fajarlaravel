<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;



    protected $table = 'siswa';
    protected $primaryKey = 'nisn';
    protected $keyType = 'string';

    protected $fillable = [
        'nisn',
        'nama',
        'no_hp',
        'alamat',
        'foto',
        'kelas_id'
    ];

    public function Siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }
}


