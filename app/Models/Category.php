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

class Category extends Model implements HasMedia , TranslatableContract
{
    use HasFactory , SoftDeletes ;
    use InteractsWithMedia;
    use Translatable;

    protected $table = "categories";
    public $translatedAttributes = ['name','slug','description'];
    protected $guarded = [];
    protected $appends = ['category_icon'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at' ,
        'media'
    ];

    public function getCategoryIconAttribute()
    {
        $images = array();

        foreach ($this->getMedia('category_icon') as $image)
        {
            array_push($images, $image->getFullUrl());
        }

        return $images;
    }

    public function registerMediaCollections() : void {

        $this->addMediaCollection('category_icon')
            ->singleFile();
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }


}
