<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ExamQuestion;
use App\Models\Exam;
use Livewire\WithPagination;
use DB;

class DisplayQuestion extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $exam;

    public function render()
    {
        if ($this->exam) {
            $questions =  DB::table('exam_questions as eq')
            ->select(['eq.id','eq.question','es.name'])
            ->leftJoin('exams as e','eq.exam_id','e.id')
            ->leftJoin('exam_translations as es','es.exam_id','e.id')
            ->where('e.id',$this->exam)
            ->where('es.locale','en')
            ->orderBy('e.id')
            ->paginate(20);
            
        }else {
            $questions =  DB::table('exam_questions as eq')
            ->select(['eq.id','eq.question','es.name'])
            ->leftJoin('exams as e','eq.exam_id','e.id')
            ->leftJoin('exam_translations as es','es.exam_id','e.id')
            ->where('es.locale','en')
            ->orderBy('e.id')
            ->paginate(20);
        }

       
        
        return view('livewire.display-question')
                ->with([
                    'questions' => $questions ,
                    'exams' => Exam::all()
        ]);
    }

    
}
