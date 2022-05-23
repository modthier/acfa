<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $appends = ['avatar','user_interests'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
        'media',
        'roles'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    

    public function registerMediaCollections() : void {

        $this->addMediaCollection('avatars')
            ->singleFile();

    }
    
    public function getAvatarAttribute()
    {
        return $this->getFirstMediaUrl('avatars');
    }

    public function getUserInterestsAttribute()
    {
        $interests = array();

        foreach ($this->courses as $interest)
        {
            array_push($interests, $interest->name);
        }

        return $interests;
    }

    public function certIds()
    {
        return $this->hasMany(CertificateId::class);
    }

    public function country()
    {
    	return $this->belongsTo(Country::class);
    }

    

    public function exams()
    {
        return $this->belongsToMany(User::class,'user_exam_results','exam_id','user_id')
              ->as('exam_result')
              ->withPivot('status')
              ->withPivot('retake_date')
              ->withPivot('score')
              ->withTimestamps();
    }

    public function subs()
    {
        return $this->hasMany(Subscription::class);
    }


    public function scores()
    {
        return $this->hasMany(ScoreResult::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class,'user_interests','user_id','interest')
                ->withTimestamps();
    }
}
