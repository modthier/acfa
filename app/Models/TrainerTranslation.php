<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class TrainerTranslation extends Model
{
    use HasFactory;
    use Sluggable;

    public $timestamps = false;
    protected $fillable = ['name','slug','bio','work_experience'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
