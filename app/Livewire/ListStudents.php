<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class ListStudents extends Component
{
    use WithPagination;
    
    public function render()
    {
        return view('livewire.list-students',[
            'students' => Student::paginate(),
        ]);
    }

    public function deleteStudent($student_id)
    {
        Student::find($student_id)->delete();
    }
}
