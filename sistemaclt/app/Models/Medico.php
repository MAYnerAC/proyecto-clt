<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    //use HasFactory;

    protected $table = 'medicos'; // Para especificar el nombre de la tabla en las migraciones

    protected $fillable = [
        'persona_id',
        'cmp',
        'especialidad_id',
        'activo',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }
}
