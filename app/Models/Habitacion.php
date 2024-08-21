<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;

    protected $table = 'habitaciones';
    protected $primaryKey = 'id_habitacion';

    protected $fillable = ['comentarios', 'id_hotel', 'id_tipo_habitacion', 'estado'];

    // Relación con el hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotel');
    }

    // Relación con tipo de habitaciones
    public function tipoHabitacion()
    {
        return $this->belongsTo(TipoHabitacion::class, 'id_tipo_habitacion');
    }

    // Relación con reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_habitacion');
    }
}
