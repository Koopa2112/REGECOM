<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class analistas extends Model
{
    use HasFactory;

    protected $table = 'analistas';

    public function empleado(){
        return $this->belongsTo(empleados::class, 'id_empleado', 'id');
    }
}
