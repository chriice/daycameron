<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hoteles';  // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_hotel';  // Clave primaria de la tabla

    protected $fillable = ['nombre', 'direccion', 'id_ciudad'];

    // Relación con la tabla ciudades
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad');
    }
}
