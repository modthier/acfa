<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestionAnswer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function examQuestion()
    {
        return $this->belongsTo(ExamQuestion::class,'question_id');
    }
}
