<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
class Carrito extends Model
{
    use HasFactory;
    protected $fillable = [
        'cliente_id',
        'total',
    ];
    
    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }
    public function trabajadores()
    {
        // haciendole caso a chat
        return $this->belongsToMany(Trabajadore::class, 'carrito_trabajador');
    }
}
