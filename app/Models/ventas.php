<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    use HasFactory;
    //protected $table = 'ventas';

    public function asesor(){
        return $this->belongsTo(asesores::class, 'asesor_id', 'id');
    }
    
    public function analista(){
        return $this->belongsTo(analistas::class, 'analista_id', 'id');
    }

    public function equipo(){
        return $this->belongsTo(equipos::class, 'equipo_id', 'id');
    }

    public function ruta(){
        return $this->belongsTo(rutas::class, 'ruta_id', 'id');
    }

    public function zona(){
        return $this->belongsTo(zonas::class, 'zona_id', 'id');
    }
}
