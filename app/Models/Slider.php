<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;

class Slider extends Model implements HasMedia , TranslatableContract
{
    use HasFactory;
    use InteractsWithMedia;
    use Translatable;
    
    protected $guarded = [];
    public $translatedAttributes = ['name','content'];
    protected $appends = ['slider_image'];

    public function getSliderImageAttribute()
    {
        $images = array();

        foreach ($this->getMedia('slider_image') as $image)
        {
            array_push($images, $image->getFullUrl());
        }

        return $images;
    }

    public function registerMediaCollections() : void {

        $this->addMediaCollection('slider_image')
            ->singleFile();
    }


}
