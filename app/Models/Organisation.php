<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Organisation extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'user_id',
        'slug',
        'avatar_path',
        'email',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sites()
    {
        return $this->hasMany(Site::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'organisation_members')->withTimestamps();
    }

    public function getDisplayableAvatar()
    {
        if ($this->avatar_path) {
            return Storage::url($this->avatar_path);
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) .  '&color=FFFFFF&background=111827';
    }
}