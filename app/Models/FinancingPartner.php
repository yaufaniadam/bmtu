<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingPartner extends Model
{
    use HasFactory;
    protected $table = 'tr_mitra_pembiayaan';

    protected $fillable = [
        'id_pegawai',
        'nama_lengkap',
        'alamat',
        'kabupaten',
        'telepon',
        'email',
        'pekerjaan',
        'pendidikan_terakhir',
        'foto'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_pegawai');
    }

    public function marketingReports()
    {
        return $this->hasMany(MarketingReport::class, 'id_mitra_pembiayaan');
    }
}
