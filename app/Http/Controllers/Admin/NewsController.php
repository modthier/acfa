<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsTranslation;
use Illuminate\Http\Request;
use App\Http\Requests\NewsFormRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Jobs\SendNewsLetter;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.index')
        ->with(['news' => News::orderBy('id','desc')->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsFormRequest $request)
    {
        $title_en = SlugService::createSlug(NewsTranslation::class, 'slug', $request->title_en);
        $title_ar = SlugService::createSlug(NewsTranslation::class, 'slug', $request->title_ar);

        
        $data = [
            
            'en' => [
             'title'  => $request->input('title_en'),
             'summary' => $request->input('summary_en'),
             'content' => $request->input('content_en'),
             'slug' => $title_en
            ],
            'ar' => [
             'title'  => $request->input('title_ar'),
             'summary' => $request->input('summary_ar'),
             'content' => $request->input('content_ar'),
             'slug' => $title_ar
            ]
         
        ];

        $news = News::create($data);

        if ($request->hasFile('image')) {
            $news->addMedia($request->image)->toMediaCollection('news_image');
        }
       

        if ($news) {
            SendNewsLetter::dispatch($news);
            // session()->flash('message','News Save Successfully');
            // return redirect()->route('admin.news.index');
        }else {
            return redirect()->route('admin.news.create')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin.news.show')->with(['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.show')->with(['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsFormRequest $request, News $news)
    {
        if ($news->translate('en')->title != $request->title_en) {
            $title_en = SlugService::createSlug(NewsTranslation::class, 'slug', $request->title_en);
        }else {
            $title_en = $news->translate('en')->slug;
        }

        if ($news->translate('ar')->title != $request->title_ar) {
            $title_ar = SlugService::createSlug(NewsTranslation::class, 'slug', $request->title_ar);
        }else {
            $title_ar = $news->translate('ar')->slug;
        }

        $data = [
            
            'en' => [
                'title'  => $request->input('title_en'),
                'summary' => $request->input('summary_en'),
                'content' => $request->input('content_en'),
                'slug' => $title_en
               ],
               'ar' => [
                'title'  => $request->input('title_ar'),
                'summary' => $request->input('summary_ar'),
                'content' => $request->input('content_ar'),
                'slug' => $title_ar
               ]
         
        ];

        $news->update($data);

        if ($request->hasFile('image')) {
            $imageItem = $news->getMedia('news_image');
            Storage::disk('public')->delete($imageItem->first()->id."\\".$imageItem->first()->file_name);
            Storage::deleteDirectory(storage_path('app/public/'.$imageItem->first()->id));
            $imageItem[0]->delete();
            $news->addMedia($request->image)->toMediaCollection('news_image');
        }
       

      if ($news) {
             SendNewsLetter::dispatch($news);
          session()->flash('message','News Updated Successfully');
          return redirect()->route('admin.news.index');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        session()->flash('message','News Deleted Successfully');
        return redirect()->route('admin.news.index');
    }
}
