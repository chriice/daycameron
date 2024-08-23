<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
    use HasFactory;

    protected $table = 'invitados';
    protected $primaryKey = 'id_invitados';
    public $incrementing = true;

    protected $fillable = ['nombres', 'apellidos'];

    // Relación con cliente (si se utiliza)
    public function cliente()
    {
        return $this->hasMany(Invitado::class, 'id_reserva');
    }
}
