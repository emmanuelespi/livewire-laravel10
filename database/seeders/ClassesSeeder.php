<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::factory()
        //Define que insertará 10 clases en la tabla de Classes
        ->count(10) 
        // Funciona como un ciclo for, el cual, por cada vuelta del contador, insertará un nombre de clase y su numero consectivo el cual es la variable $sequence
        ->sequence(fn($sequence) => ['name' => 'Class '. $sequence->index + 1]) 
            // Define la relación del modelo
            ->has(
                Section::factory()
                    ->count(2)
                    ->state(
                        new Sequence(
                            ['name' => 'Section A'],
                            ['name' => 'Section B'],
                        )
                    )
                    ->has(
                        Student::factory()
                            ->count(5)
                            ->state(
                                function (array $attributes, Section $section){
                                    return ['class_id' => $section->class_id];
                                }
                            )
                    )
            )
            //Esta línea crea todos los datos
            ->create();
    }
}
