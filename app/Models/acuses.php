<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class acuses extends Model
{
    use HasFactory;

    public function ventas()
    {
        return $this->hasMany(ventas::class, 'id_acuse');
    }
}
