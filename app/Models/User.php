<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'provider_avatar',
        'provider',
        'provider_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    public function organisations()
    {
        return $this->belongsToMany(Organisation::class, 'organisation_members');
    }

    public function getDisplayableAvatar()
    {
        if ($this->avatar) {
            return Storage::url($this->avatar);
        } elseif ($this->provider_avatar) {
            return $this->provider_avatar;
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) .  '&color=FFFFFF&background=111827';
    }
}