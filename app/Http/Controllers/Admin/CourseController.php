<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Trainer;
use App\Models\Category;
use App\Models\CourseTranslation;
use App\Http\Requests\CourseFormRequest;
use App\Http\Requests\CourseFormUpdateRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create')  
               ->with([
                   'categories' => Category::all(),
                   'trainers' => Trainer::all()
               ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseFormRequest $request)
    {
        
        $name_en = SlugService::createSlug(CourseTranslation::class, 'slug', $request->name_en);
        $name_ar = SlugService::createSlug(CourseTranslation::class, 'slug', $request->name_ar);

        $data = [
            'price' => $request->price,
            'category_id' => $request->category_id,
            'trainer_id' => $request->trainer_id,
            'hours' => $request->hours ,
            'weeks' => $request->weeks,
            'days_in_week' => $request->days_in_week,
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

      $course = Course::create($data);
      if ($request->hasFile('icon')) {
        $course->addMedia($request->icon)->toMediaCollection('course_icon');
      }

      if ($course) {
          session()->flash('message','Course Save Successfully');
          return redirect()->route('admin.course.index');
      }else {
        return redirect()->route('admin.course.create')->withInput();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('admin.course.show')->with(['course',$course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('admin.course.edit')
        ->with([
            'course' => $course ,
            'categories' => Category::all(),
            'trainers' => Trainer::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseFormRequest $request, Course $course)
    {   
        if ($course->translate('en')->name != $request->name_en) {
            $name_en = SlugService::createSlug(CourseTranslation::class, 'slug', $request->name_en);
        }else {
            $name_en = $course->translate('en')->slug;
        }

        if ($course->translate('ar')->name != $request->name_ar) {
            $name_ar = SlugService::createSlug(CourseTranslation::class, 'slug', $request->name_ar);
        }else {
            $name_ar = $course->translate('ar')->slug;
        }

        $data = [
            'price' => $request->price,
            'category_id' => $request->category_id,
            'trainer_id' => $request->trainer_id,
            'hours' => $request->hours ,
            'weeks' => $request->weeks,
            'days_in_week' => $request->days_in_week,
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

      if ($course->update($data)) {
          session()->flash('message','Course updated Successfully');
          return redirect()->route('admin.course.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        session()->flash('message','Course Deleted Successfully');
          return redirect()->route('admin.course.index');
    }
}
