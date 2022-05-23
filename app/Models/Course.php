<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model implements HasMedia , TranslatableContract
{
    use HasFactory , SoftDeletes;
    use InteractsWithMedia;
    use Translatable;

    protected $table = "courses";
    public $translatedAttributes = ['name','slug','description'];
    protected $guarded = [];
    protected $appends = ['course_icon'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'media'
    ];

    public function getCourseIconAttribute()
    {
        $images = array();

        foreach ($this->getMedia('course_icon') as $image)
        {
            array_push($images, $image->getFullUrl());
        }

        return $images;
    }

    public function registerMediaCollections() : void {

        $this->addMediaCollection('course_icon')
            ->singleFile();
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class,'trainer_id','id');
    }

    public function subscriptions()
    {
        return $this->morphMany(Subscription::class, 'subscriptionable');
    }

    public function users()
    {
        return $this->belongsToMany(user::class,'user_interests','interest','user_id')
                ->withTimestamps();
    }
}


