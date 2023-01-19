<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kajian extends Model
{
    use HasFactory;
    protected $table = 'tr_kajian';
    protected $casts = [
        'tanggal' => 'date',
    ];

    protected $fillable = [
        'id_pegawai',
        'faidah',
        'foto',
        'tanggal'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_pegawai');
    }
}
