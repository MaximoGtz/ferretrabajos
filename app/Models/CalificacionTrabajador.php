<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalificacionTrabajador extends Model
{
    use HasFactory;
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function trabajador(){
        return $this->belongsTo(Trabajadore::class);
    }
}
