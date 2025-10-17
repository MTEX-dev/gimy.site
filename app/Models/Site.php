<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Site extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'custom_domain',
        'description',
        'status',
        'storage_path',
        'size_bytes',
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

    public function files()
    {
        return $this->hasMany(SiteFile::class);
    }

    public function backups()
    {
        return $this->hasMany(SiteBackup::class);
    }

    public function visits()
    {
        return $this->hasMany(SiteVisit::class);
    }

    public function members()
    {
        return $this->hasMany(SiteMember::class);
    }
}