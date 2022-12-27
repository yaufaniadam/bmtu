<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
    use HasFactory;
    protected $table = 'tr_penempatan';

    protected $fillable = [
        'id_pegawai',
        'id_cabang',
        'id_posisi',
        'status_pegawai',
        'tanggal_mulai',
        'tanggal_selesai',
        'file_sk',
        'surat_penempatan'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_pegawai');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'id_cabang');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'id_posisi');
    }
}
