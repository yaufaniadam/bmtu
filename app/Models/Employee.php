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
}
