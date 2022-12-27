<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'mstr_cabang';

    public function placements()
    {
        return $this->hasMany(Placement::class, 'id_cabang');
    }
}
