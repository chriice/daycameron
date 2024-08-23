<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';
    protected $primaryKey = 'id_reserva';

    protected $fillable = ['fecha_entrada', 'fecha_salida', 'id_habitacion', 'id_cliente', 'id_extra', 'total'];

    // Relación con habitación
    public function habitacion()
    {
        return $this->belongsTo(habitacion::class, 'id_habitacion');
    }

    // Relación con cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    // Relación con extras
    public function extra()
    {
        return $this->belongsTo(Extra::class, 'id_extra');
    }
    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'id_reserva');
    }
}
