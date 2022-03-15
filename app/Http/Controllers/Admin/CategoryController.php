<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Http\Requests\CategoryFormRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withCount('courses')->orderBy('id','desc')->paginate(20);
        
        return view('admin.category.index')
            ->with([
                'categories' => $categories
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
       
        $name_en = SlugService::createSlug(CategoryTranslation::class, 'slug', $request->name_en);
        $name_ar = SlugService::createSlug(CategoryTranslation::class, 'slug', $request->name_ar);
        $data = [
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


        $category = Category::create($data);

        if ($request->hasFile('icon')) {
            $category->addMedia($request->icon)->toMediaCollection('category_icon');
        }
       

      if ($category) {
          session()->flash('message','Category Save Successfully');
          return redirect()->route('admin.category.index');
      }else {
        return redirect()->route('admin.category.create')->withInput();
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category.show')->with(['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit')->with(['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if ($category->translate('en')->name != $request->name_en) {
            $name_en = SlugService::createSlug(CategoryTranslation::class, 'slug', $request->name_en);
        }else {
            $name_en = $category->translate('en')->slug;
        }

        if ($category->translate('ar')->name != $request->name_ar) {
            $name_ar = SlugService::createSlug(CategoryTranslation::class, 'slug', $request->name_ar);
        }else {
            $name_ar = $category->translate('ar')->slug;
        }
        
        $data = [
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


        $category->update($data);

        if ($request->hasFile('icon')) {
            if ($imageItem->first() != null) {
                Storage::disk('public')->delete($imageItem->first()->id."\\".$imageItem->first()->file_name);
                Storage::deleteDirectory(storage_path('app/public/'.$imageItem->first()->id));
                $imageItem[0]->delete();
            }
            $category->addMedia($request->icon)->toMediaCollection('category_icon');
        }
       

      if ($category) {
          session()->flash('message','Category Updated Successfully');
          return redirect()->route('admin.category.index');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('message','Category Deleted Successfully');
        return redirect()->route('admin.category.index');
    }
}
