<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.trainer.index')
            ->with(['trainers' => Trainer::orderBy('id','desc')->paginate(12)]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $trainer = Trainer::whereTranslation('slug', $slug)->firstOrFail();
        $lang = app()->getLocale();
        if ($trainer->translate()->where('slug', $slug)->first()->locale != $lang) {
            return redirect()->route('main.trainer.show', $trainer->translate()->slug);
        }
        return view('main.trainer.show')
            ->with(['trainer' => $trainer]);
    }

    
    

    
}
