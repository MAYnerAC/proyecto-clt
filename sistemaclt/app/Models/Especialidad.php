<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidades'; // Para especificar el nombre de la tabla en las migraciones(para no usar especialidads)

    protected $fillable = ['nombre', 'codigo_ups', 'activo'];

    public function medicos()
    {
        return $this->hasMany(Medico::class);
    }
}
