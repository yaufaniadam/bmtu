<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'tr_pegawai';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'jenis_kelamin',
        'email',
        'telepon',
        'nip',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'foto'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function placements()
    {
        return $this->hasMany(Placement::class, 'id_pegawai');
    }

    public function partners()
    {
        return $this->hasMany(FinancingPartner::class, 'id_pegawai');
    }

    public function marketingReports()
    {
        return $this->hasMany(MarketingReport::class, 'id_pegawai');
    }
    public function marketingReportsDone()
    {
        return $this->marketingReports()
            ->leftJoin('tr_status_pembiayaan', 'tr_status_pembiayaan.id_laporan_marketing', '=', 'tr_laporan_marketing.id')
            ->where('tr_status_pembiayaan.id_cycle', '=', 5);
    }

    public function sermons()
    {
        return $this->hasMany(Kajian::class, 'id_pegawai');
    }
}
