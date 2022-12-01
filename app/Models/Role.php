<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected  $fillable = ['role'];

    public const IS_HRD = 1;
    public const IS_MARKETING_MANAGER = 2;
    public const IS_MARKETING_EMPLOYEE = 3;
    public const IS_EMPLOYEE = 4;
}
