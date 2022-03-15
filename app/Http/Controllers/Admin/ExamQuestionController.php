<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ExamQuestionFormRequest;
use App\Models\ExamQuestion;
use App\Models\Exam;
use App\Models\ExamQuestionAnswer;


class ExamQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.question.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.question.create')
            ->with(['exams' => Exam::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamQuestionFormRequest $request)
    {
        $data = [
            'question' => $request->question ,
            'exam_id' => $request->exam_id
        ];

        $examQuestion = ExamQuestion::create($data);


        if ($examQuestion) {
           
           for ($i=1; $i < 5 ; $i++) { 
             $data = [
                 'choice' => $request->input('choice-'.$i),
                 'correct' => $request->input('choice-'.$i.'-select'),
                 'question_id' => $examQuestion->id
             ];
             ExamQuestionAnswer::create($data);
           }
           

            session()->flash('message','Question Save Successfully');
            return redirect()->route('admin.question.create');
    
        }else {
            return redirect()->route('admin.question.create')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $examQuestion = ExamQuestion::findOrFail($id);
        return view('admin.question.show')->with(['question' => $examQuestion ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examQuestion = ExamQuestion::findOrFail($id);
        
        return view('admin.question.edit')
            ->with([
                'question' => $examQuestion,
                'exams' => Exam::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamQuestionFormRequest $request, $id)
    {
        
        $examQuestion = ExamQuestion::findOrFail($id);
        
        $data = [
            'question' => $request->question ,
            'exam_id' => $request->exam_id
        ];

        $examQuestion->update($data);
        
        $i = 1;
        foreach ($examQuestion->examQuestionAnswers as $item) {
            $examQuestionOption = ExamQuestionAnswer::findOrFail($item->id);
            $data = [
                'choice' => $request->input('choice-'.$i),
                'correct' => $request->input('choice-'.$i.'-select')
            ];

            $examQuestionOption->update($data);
            $i++;
        }
           
           
        
        
        session()->flash('message','Question Updated Successfully');
        return redirect()->route('admin.question.edit',$examQuestion->id)
            ->with([
                'question' => $examQuestion ,
                'exams' => Exam::all() 
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamQuestion $examQuestion)
    {
        $examQuestion->delete();
        session()->flash('message','Question Deleted Successfully');
        return redirect()->route('admin.question.index');
    }
}
