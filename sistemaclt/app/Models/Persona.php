<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Factories\HasFactory;

class Persona extends Model
{
    //use HasFactory;

    protected $table = 'personas'; // Para especificar el nombre de la tabla en las migraciones

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'tipo_documento',
        'numero_documento',
        'telefono',
        'email',
        'direccion',
        'ubigeo',
    ];

    public function medico()
    {
        return $this->hasOne(Medico::class);
    }
}
