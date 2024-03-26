<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'name',
    ];

    public function class()
    {
        //Esta línea establece una permanencia que la SECCIÓN pertenece a una CLASE.
        return $this->belongsTo(Classes::class,'class_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
