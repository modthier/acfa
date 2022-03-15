<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;


class Trainer extends Model implements TranslatableContract , HasMedia 
{
    use HasFactory , SoftDeletes;
    use Translatable;
    use InteractsWithMedia;
    
    

    public $translatedAttributes = ['name','slug','bio','work_experience'];
    protected $guarded = [];
    protected $appends = ['trainer_image','trainer_cert','trainer_courses'];

    public function registerMediaCollections() : void {

        $this->addMediaCollection('trainer_image')
            ->singleFile();
    }

    public function getTrainerImageAttribute()
    {
        $images = array();

        foreach ($this->getMedia('trainer_image') as $image)
        {
            array_push($images, $image->getFullUrl());
        }

        return $images;
    }

    public function getTrainerCertAttribute()
    {
        $certs = array();

        foreach ($this->certs as $cert)
        {
            array_push($certs, $cert->name);
        }

        return $certs;
    }

    public function certs()
    {
        return $this->hasMany(Certification::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function getTrainerCoursesAttribute()
    {
        $courses = array();

        foreach ($this->courses as $course)
        {
            array_push($courses, $course->name);
        }

        return $courses;
    }

    
}
