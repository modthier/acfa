<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;

class DisplayCourses extends Component
{
    public $courseTerm;

    use WithPagination;
    public function render()
    {
        if ($this->courseTerm) {
           $term = "%".$this->courseTerm."%";
           $courses = Course::whereTranslationLike('name',$term)
                ->orderBy('id','desc')
                ->paginate(20);
        }else {
            $courses = Course::orderBy('id','desc')
                ->paginate(20);
        }
        return view('livewire.display-courses')->with(['courses' => $courses]);
    }
}
