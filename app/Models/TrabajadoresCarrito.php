<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabajadoresCarrito extends Model
{
    use HasFactory;
    public function Carrito()
    {
        return $this->hasMany(Carrito::class);
    }
    public function Trabajador()
    {
        return $this->belongsTo(Trabajadore::class);
    }

}
