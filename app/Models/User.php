<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{

    use HasFactory, HasApiTokens, Notifiable, HasRoles, SoftDeletes, LogsActivity, InteractsWithMedia;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $appends = ['profile_image_url'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'text']);
        // Chain fluent methods for configuration options
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('user_profile');
    }


    public function getProfileImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('user_profile');
    }
}