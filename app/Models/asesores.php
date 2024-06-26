<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asesores extends Model
{
    //use HasFactory;

    protected $table = 'asesores';

    public function administrativo(){
        return $this->belongsTo(administrativos::class, 'id_administrativo', 'id');
    }

    public function user(){
        return $this->belongsTo(user::class, 'id_user', 'id');
    }

}
