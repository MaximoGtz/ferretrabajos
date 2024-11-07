<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    public function Carrito(){
        return $this->belongsTo(Carrito::class);
    }
    public function Cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
