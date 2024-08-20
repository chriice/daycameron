<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'ciudades';  // Nombre de la tabla
    protected $primaryKey = 'id_ciudad';  // Clave primaria
}
