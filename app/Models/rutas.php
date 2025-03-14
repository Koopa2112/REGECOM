<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rutas extends Model
{
    use HasFactory;

    protected $table = 'rutas';

    public function zona(){
        return $this->belongsTo(zonas::class, 'id_zona', 'id');
    }

    public function repartidor(){
        return $this->belongsTo(user::class, 'id_repartidor', 'id');
    }
}
