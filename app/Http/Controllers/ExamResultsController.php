<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\ExamQuestionAnswer;



class ExamResultsController extends Controller
{
 
    public function store(Request $request)
    {
        
        $exam_id = $request->input('exam_id');
        $exam = Exam::findOrFail($exam_id);
        $questionCount = $exam->questions()->count();
        $examQuestion = new ExamQuestion;
        $answers = [];
        $studentAnswers = [];
        foreach ($exam->questions as $question) {
            if ($request->input('qn-'.$question->id) == $examQuestion->correctAnswer($question->id)) {
                $answers[] = 1;
             }
             array_push($studentAnswers,$request->input('qn-'.$question->id));
        }

        $score = (count($answers) / $questionCount) * 100 ;
        $databaseAnswers = ExamQuestionAnswer::with('examQuestion')->whereIn('id',$studentAnswers)->get();
        
        
        return view('main.exam.result')
                ->with([
                    'score' => $score ,
                    'answers' => $databaseAnswers
                ]);

    }
}
