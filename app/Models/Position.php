<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = 'mstr_posisi';

    public function placements()
    {
        return $this->hasMany(Placement::class, 'id_posisi');
    }
}
