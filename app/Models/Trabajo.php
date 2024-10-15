<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;
    public function cliente(){
        $this->belongsToMany(Cliente::class);
    }
    public function trabajador(){
        $this->belongsToMany(Trabajadore::class);
    }
}
