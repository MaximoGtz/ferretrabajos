<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajadore extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apelidos', 'correo', 'contrasena', 'rfc','especialidad', 'imagen'];
    
    public function calificaciones()
    {
        return $this->hasMany(CalificacionTrabajador::class);
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    // public function carritos(){
    //     return $this->hasMany(Carrito::class);
    // }
}
