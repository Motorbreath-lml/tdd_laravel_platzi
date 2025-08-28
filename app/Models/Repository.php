<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    /** @use HasFactory<\Database\Factories\RepositoryFactory> */
    use HasFactory;

    // Definir los campos que se pueden asignar masivamente
    // Estos campos deben coincidir con los de la base de datos
    protected $fillable = [ 
        'url',
        'description',
    ];

    // indicar que el modelo pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }
}
