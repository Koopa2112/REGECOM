<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administrativos extends Model
{
    //use HasFactory;

    protected $table = 'administrativos';

    public function user(){
        return $this->belongsTo(user::class, 'id_user', 'id');
    }
}
