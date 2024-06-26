<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreResult extends Model
{
    use HasFactory;
    protected $table = "score_results";
    protected $guarded = [];

    public function exam()
    {
       return $this->belongsTo(Exam::class);
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
