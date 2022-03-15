<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScoreResult;
use App\Models\User;
use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Requests\ScoreResultFormRequest;


class ScoreResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.score.index')
        ->with([
            'scores' => ScoreResult::orderBy('id','desc')->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $exams = Exam::all();
        return view('admin.score.create')
            ->with([
                'users' => $users,
                'exams' => $exams
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScoreResultFormRequest $request)
    {
        $data = [
            'exam_id' => $request->exam_id ,
            'user_id' => $request->user_id,
            'candidate_number' => $request->candidate_number,
            'center_number' => $request->center_number,
            'test_date' => $request->test_date,
            'overall' => $request->overall,
            'listening' => $request->listening,
            'reading' => $request->reading,
            'writing' => $request->writing,
            'speaking' => $request->speaking,
            'overall_band_score' => $request->overall_band_score,
            'overall_adjective' => $request->overall_adjective,
            'overall_description' => $request->overall_description
        ];

        $score = ScoreResult::create($data);
        if ($score) {
           session()->flash('message','Score Results Save Successfully');
           return redirect()->route('admin.scoreResult.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScoreResult  $scoreResult
     * @return \Illuminate\Http\Response
     */
    public function show(ScoreResult $scoreResult)
    {
        return view('admin.score.show')->with(['score' => $scoreResult]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScoreResult  $scoreResult
     * @return \Illuminate\Http\Response
     */
    public function edit(ScoreResult $scoreResult)
    {
        $users = User::all();
        $exams = Exam::all();
        return view('admin.score.edit')
        ->with([
            'score' => $scoreResult,
            'users' => $users,
            'exams' => $exams
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScoreResult  $scoreResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScoreResult $scoreResult)
    {
        $data = [
            'exam_id' => $request->exam_id ,
            'user_id' => $request->user_id,
            'candidate_number' => $request->candidate_number,
            'center_number' => $request->center_number,
            'test_date' => $request->test_date,
            'overall' => $request->overall,
            'listening' => $request->listening,
            'reading' => $request->reading,
            'writing' => $request->writing,
            'speaking' => $request->speaking,
            'overall_band_score' => $request->overall_band_score,
            'overall_adjective' => $request->overall_adjective,
            'overall_description' => $request->overall_description
        ];

        $scoreResult->update($data);
        if ($scoreResult) {
           session()->flash('message','Score Results Save Successfully');
           return redirect()->route('admin.scoreResult.edit',$scoreResult->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScoreResult  $scoreResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScoreResult $scoreResult)
    {
        $scoreResult->delete();
        session()->flash('message','Score Results Deleted Successfully');
        return redirect()->route('admin.scoreResult.index');
    }
}
