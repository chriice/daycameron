<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    use HasFactory;

    protected $table = 'extras';
    protected $primaryKey = 'id_extra';
    protected $fillable = ['nombre', 'precio'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_extra');
    }
}
