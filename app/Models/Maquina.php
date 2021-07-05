<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maquina extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id', 'modelo', 'marca', 'operador'];
    protected $casts = [
        'id' => 'string'
    ];
}
