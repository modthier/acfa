<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;

class News extends Model implements HasMedia ,  TranslatableContract
{
    use HasFactory;
    use InteractsWithMedia;
    use Translatable;

    protected $table = "news";
    public $translatedAttributes = ['title','summary','content','slug'];
    protected $guarded = [];
    protected $appends = ['news_image'];

    public function registerMediaCollections() : void {

        $this->addMediaCollection('news_image')
            ->singleFile();
    }

    public function getNewsImageAttribute()
    {
        $images = array();

        foreach ($this->getMedia('news_image') as $image)
        {
            array_push($images, $image->getFullUrl());
        }

        return $images;
    }
}
