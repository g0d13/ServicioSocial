<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bitacora extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nombre', 'mecanico_id', 'planta_id'];

    public function mecanico()
    {
        //Bitacora::find(2)->solicitudes->count()
        return $this->hasOne(User::class, 'id', 'mecanico_id');
    }
    public function solicitudes(){
        return $this->hasMany(Solicitud::class);
    }
}
