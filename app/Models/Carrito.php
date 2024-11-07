<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;
    public function Contrato()
    {
        return $this->belongsTo(Contrato::class);
    }
    public function Trabajadores()
    {
        return $this->hasMany(Trabajadore::class);
    }
}
