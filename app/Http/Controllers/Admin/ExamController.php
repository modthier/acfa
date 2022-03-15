<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Exam;
use App\Models\ExamTranslation;
use App\Http\Requests\ExamFormRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Storage;
use File;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.exam.index')
                ->with(['exams' => Exam::orderBy('id','desc')->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamFormRequest $request)
    {
        $name_en = SlugService::createSlug(ExamTranslation::class, 'slug', $request->name_en);
        $name_ar = SlugService::createSlug(ExamTranslation::class, 'slug', $request->name_ar);

        $data = [
            'price' => $request->price ,
            'payment_status' => $request->payment_status ,
            'exam_type' => $request->exam_type,
            'en' => [
             'name'  => $request->input('name_en'),
             'slug' => $name_en,
             'description' => $request->input('description_en')
            ],
            'ar' => [
             'name' => $request->input('name_ar'),
             'slug' => $name_ar,
             'description' => $request->input('description_ar')
            ]
         
        ];


        $exam = Exam::create($data);

        if ($request->hasFile('icon')) {
            $exam->addMedia($request->icon)->toMediaCollection('exam_icon');
        }
       

      if ($exam) {
          session()->flash('message','Exam Save Successfully');
          return redirect()->route('admin.exam.index');
      }else {
        return redirect()->route('admin.exam.create')->withInput();
      }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        return view('admin.exam.show')->with(['exam' => $exam]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        return view('admin.exam.edit')
            ->with([
                'exam' => $exam 
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamFormRequest $request, Exam $exam)
    {
        if ($exam->translate('en')->name != $request->name_en) {
            $name_en = SlugService::createSlug(ExamTranslation::class, 'slug', $request->name_en);
        }else {
            $name_en = $exam->translate('en')->slug;
        }

        if ($exam->translate('ar')->name != $request->name_ar) {
            $name_ar = SlugService::createSlug(ExamTranslation::class, 'slug', $request->name_ar);
        }else {
            $name_ar = $exam->translate('ar')->slug;
        }

        $data = [
            'price' => $request->price ,
            'payment_status' => $request->payment_status ,
            'exam_type' => $request->exam_type,
            'en' => [
             'name'  => $request->input('name_en'),
             'slug' => $name_en,
             'description' => $request->input('description_en')
            ],
            'ar' => [
             'name'       => $request->input('name_ar'),
             'slug' => $name_ar,
             'description' => $request->input('description_ar')
            ]
         
        ];


        $exam->update($data);

        if ($request->hasFile('icon')) {

            $imageItem = $exam->getMedia('exam_icon');
            
            if ($imageItem->first() != null) {
                Storage::disk('public')->delete($imageItem->first()->id."\\".$imageItem->first()->file_name);
                Storage::deleteDirectory(storage_path('app/public/'.$imageItem->first()->id));
                $imageItem[0]->delete();
            }
           
            $exam->addMedia($request->icon)->toMediaCollection('exam_icon');
        }
       

      if ($exam) {
          session()->flash('message','Exam Updated Successfully');
          return redirect()->route('admin.exam.index');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();
        session()->flash('message','Exam Deleted Successfully');
        return redirect()->route('admin.exam.index');
    }
}
