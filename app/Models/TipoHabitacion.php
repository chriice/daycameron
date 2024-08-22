<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoHabitacion extends Model
{
    use HasFactory;

    protected $table = 'tipo_habitaciones'; // Asegúrate de que el nombre de la tabla sea correcto

    protected $primaryKey = 'id_tipo_habitacion'; // Asegúrate de que el nombre de la clave primaria sea correcto

    protected $fillable = ['nombre', 'capacidad', 'precio'];

    // Relación con habitaciones
    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class, 'id_tipo_habitacion');
    }
}
