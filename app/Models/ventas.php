<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    use HasFactory;
    //protected $table = 'ventas';

    public function asesor(){
        return $this->belongsTo(asesores::class, 'id_asesor', 'id');
    }
    
    public function analista(){
        return $this->belongsTo(analistas::class, 'id_analista', 'id');
    }

    public function equipo(){
        return $this->belongsTo(equipos::class, 'id_equipo', 'id');
    }

    public function ruta(){
        return $this->belongsTo(rutas::class, 'id_ruta', 'id');
    }

    public function zona(){
        return $this->belongsTo(zonas::class, 'id_zona', 'id');
    }
}
