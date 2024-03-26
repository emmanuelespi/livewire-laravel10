<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    //Se define la relación en el modelo, aparte de las llaves en las migraciones.
    public function sections()
    {
        //Esta línea establece la relación que una SECCIÓN tiene muchas CLASES.
        return $this->hasMany(Section::class,'class_id');
    }
}
