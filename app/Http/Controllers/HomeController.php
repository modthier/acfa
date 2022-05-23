<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\User;
use App\Jobs\CreateSiteMapJob;
use App\Jobs\SendExamSubscription;
use App\Models\Subscription;
use PDF;



class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('main.main')->with(['sliders' => $sliders]);
    }

    public function about()
    {
        $data = User::all();
        $pdf = PDF::loadView('main.pdf',compact('data'));
        return $pdf->download('document.pdf');
        //return view('main.about');
    }

    public function contact()
    {
        return view('main.contact');
    }

    public function sitemap()
    {
        CreateSiteMapJob::dispatch();
    }

     public function sendExamMail()
    {
        
        $sub = Subscription::findOrFail(1);
        SendExamSubscription::dispatch($sub);
    }
    
}
