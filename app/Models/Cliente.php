<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';  // Nombre de la tabla

    protected $primaryKey = 'id_cliente';  // Clave primaria

    protected $fillable = [
        'nombres',
        'apellidos',
        'dui',
        'fecha_nacimiento',
        'genero',
        'telefono',
        'correo',
        'direccion',
        'id_invitados',
    ];

    // Relación con la tabla invitados (si es necesario)
    public function invitados()
    {
        #return $this->hasMany(Invitado::class, 'id_invitados');
    }

    // Relación con la tabla reservas (si es necesario)
    public function reservas()
    {
        #return $this->hasMany(Reserva::class, 'id_cliente');
    }
}
