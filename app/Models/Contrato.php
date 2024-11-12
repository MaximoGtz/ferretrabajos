<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{   
    protected $fillable = [
        'cliente_id',
        'fecha_cita',
        'descripcion',
        'costo',
        'estado'
    ];
    use HasFactory;
    public function carrito(){
        return $this->hasOne(Carrito::class);
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
