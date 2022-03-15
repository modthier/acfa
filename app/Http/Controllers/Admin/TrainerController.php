<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TrainerFormRequest;
use App\Http\Requests\TrainerFromUpdateRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Trainer;
use App\Models\TrainerTranslation;
use App\Models\Certification;
use File;
use Storage;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.trainer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trainer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainerFormRequest $request)
    {
        
        $name_en = SlugService::createSlug(TrainerTranslation::class, 'slug', $request->name_en);
        $name_ar = SlugService::createSlug(TrainerTranslation::class, 'slug', $request->name_ar);
        $data = [
            'email' => $request->email,
            'phone' => $request->phone,
            'en' => [
             'name'  => $request->input('name_en'),
             'slug' => $name_en,
             'bio' => $request->input('bio_en'),
             'work_experience' => $request->input('work_experience_en')
            ],
            'ar' => [
             'name'       => $request->input('name_ar'),
             'slug' => $name_ar,
             'bio' => $request->input('bio_ar'),
             'work_experience' => $request->input('work_experience_ar')
            ]
         
        ];


        $trainer = Trainer::create($data);

        


        if ($request->hasFile('image')) {
            $trainer->addMedia($request->image)->toMediaCollection('trainer_image');
        }
       

        if ($trainer) {
            session()->flash('message','Trainer Save Successfully');
            return redirect()->route('admin.trainer.index');
        }else {
            return redirect()->route('admin.trainer.create')->withInput();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        return view('admin.trainer.show')->with(['trainer' => $trainer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        return view('admin.trainer.edit')->with(['trainer' => $trainer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrainerFromUpdateRequest $request, Trainer $trainer)
    {

        if ($trainer->translate('en')->name != $request->name_en) {
            $name_en = SlugService::createSlug(TrainerTranslation::class, 'slug', $request->name_en);
        }else {
            $name_en = $trainer->translate('en')->slug;
        }

        if ($trainer->translate('ar')->name != $request->name_ar) {
            $name_ar = SlugService::createSlug(TrainerTranslation::class, 'slug', $request->name_ar);
        }else {
            $name_ar = $trainer->translate('ar')->slug;
        }

        $data = [
            'email' => $request->email,
            'phone' => $request->phone,
            'en' => [
             'name'  => $request->input('name_en'),
             'slug' => $name_en,
             'bio' => $request->input('bio_en'),
             'work_experience' => $request->input('work_experience_en')
            ],
            'ar' => [
             'name'       => $request->input('name_ar'),
             'slug' => $name_ar,
             'bio' => $request->input('bio_ar'),
             'work_experience' => $request->input('work_experience_ar')
            ]
         
        ];


        $trainer->update($data);


        if ($request->hasFile('image')) {
            $imageItem = $trainer->getMedia('trainer_image');
            if ($imageItem->first() != null) {
                Storage::disk('public')->delete($imageItem->first()->id."\\".$imageItem->first()->file_name);
                Storage::deleteDirectory(storage_path('app/public/'.$imageItem->first()->id));
                $imageItem[0]->delete();
            }
            $trainer->addMedia($request->image)->toMediaCollection('trainer_image');
        }
       

      if ($trainer) {
          session()->flash('message','Trainer Updated Successfully');
          return redirect()->route('admin.trainer.index');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        $trainer->delete();
        session()->flash('message','Trainer Deleted Successfully');
        return redirect()->route('admin.trainer.index');
    }
}
