<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;

class Exam extends Model implements HasMedia ,  TranslatableContract
{
    use HasFactory , SoftDeletes;
    use InteractsWithMedia;
    use Translatable;

    protected $table = "exams";
    public $translatedAttributes = ['name','slug','description'];
    protected $guarded = [];
    protected $appends = ['exam_icon'];

    public function getExamIconAttribute()
    {
        $images = array();

        foreach ($this->getMedia('exam_icon') as $image)
        {
            array_push($images, $image->getFullUrl());
        }

        return $images;
    }

    public function registerMediaCollections() : void {

        $this->addMediaCollection('exam_icon')
            ->singleFile();
    }

  

    public function questions()
    {
        return $this->hasMany(ExamQuestion::class);
    }

    public function users()
    {
        return $this->belongsToMany(user::class,'user_exam_results','exam_id','user_id')
                ->as('exam_result')
                ->withPivot('status')
                ->withPivot('retake_date')
                ->withPivot('score')
                ->withTimestamps();
    }

    public function subscriptions()
    {
        return $this->morphMany(Subscription::class, 'subscriptionable');
    }

    public function scores()
    {
        return $this->hasMany(ScoreResult::class);
    }

}
