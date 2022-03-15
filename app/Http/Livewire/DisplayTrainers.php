<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Trainer;
use DB;
use App;

class DisplayTrainers extends Component
{
    public $term;

    use WithPagination;
    public function render()
    {
        App::setLocale('en');
        if ($this->term) {
            $searchTerm = "%".$this->term."%";
            $trainers =  Trainer::whereTranslationLike('name',$searchTerm)
                ->orWhere('phone','like',$searchTerm)
                ->orWhere('email','like',$searchTerm)
                ->orderBy('id','desc')->paginate(20);
           
        }else {
            $trainers =  Trainer::orderBy('id','desc')->paginate(20);
        }
       
        
        return view('livewire.display-trainers')->with(['trainers' => $trainers]);
    }
}


