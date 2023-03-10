<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;
    protected $table = 'mstr_cycle';

    public function financingCycles()
    {
        return $this->hasMany(FinancingCycle::class, 'id_cycle');
    }
}
