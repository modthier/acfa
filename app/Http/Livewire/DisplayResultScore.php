<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ScoreResult;

class DisplayResultScore extends Component
{
    public $scoreTerm;

    use WithPagination;
    public function render()
    {
        $scores = ScoreResult::when($this->scoreTerm,function ($query,$term) {
           return $query->where('candidate_number','LIKE',"%".$term."%");
        })->paginate(20);
        return view('livewire.display-result-score')->with(['scores' => $scores]);
    }
}
