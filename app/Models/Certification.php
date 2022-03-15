<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;
    protected $table = "certifications";
    protected $guarded = [];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}
