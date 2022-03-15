<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Jobs\CreateSiteMapJob;


class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('main.main')->with(['sliders' => $sliders]);
    }

    public function about()
    {
        return view('main.about');
    }

    public function contact()
    {
        return view('main.contact');
    }

    public function sitemap()
    {
        CreateSiteMapJob::dispatch();
    }
    
}
