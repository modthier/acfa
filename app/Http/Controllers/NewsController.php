<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.news.index')
            ->with(['news' => News::orderBy('id','desc')->paginate(10)]);
    }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $news = News::whereTranslation('slug', $slug)->firstOrFail();
        $lang = app()->getLocale();
        if ($news->translate()->where('slug', $slug)->first()->locale != $lang) {
            return redirect()->route('main.news.show', $news->translate()->slug);
        }

        $views = $news->views;
        $data = ['views' => $views+1];
        $news->update($data);

        $recent = News::orderBy('id','desc')->where('id','!=',$news->id)->limit(5)->get();
        return view('main.news.show')
            ->with([
                'news' => $news,
                'recent' => $recent
            ]);
    }

   

}
