<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;

class CertificateId extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];
    protected $appends = ['cert_image'];

    public function registerMediaCollections() : void {

        $this->addMediaCollection('cert')
            ->singleFile();
    }

    public function getCertImageAttribute()
    {
        $images = array();

        foreach ($this->getMedia('cert') as $image)
        {
            array_push($images, $image->getFullUrl());
        }

        return $images;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
