<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'hora_inicio', 'hora_fin'];

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
}
