<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
            $model->storage_path = $model->id; // Set storage_path to the UUID on creation
        });

        static::deleted(function ($site) {
            // Delete the corresponding directory and its contents
            Storage::disk('sites')->deleteDirectory($site->storage_path);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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

    /**
     * Get the base directory for this site's files.
     */
    public function getStorageDirectoryAttribute(): string
    {
        return 'sites/' . $this->storage_path;
    }

    /**
     * Get a list of files within the site's storage directory.
     * This will dynamically read from the filesystem.
     */
    public function getFilesAttribute(): array
    {
        $files = [];
        $directory = $this->storage_directory;

        if (Storage::disk('sites')->exists($directory)) {
            foreach (Storage::disk('sites')->files($directory) as $file) {
                $files[] = [
                    'path' => Str::after($file, $directory . '/'),
                    'name' => basename($file),
                    'full_path' => $file,
                    'size_bytes' => Storage::disk('sites')->size($file),
                    'last_modified' => Storage::disk('sites')->lastModified($file),
                ];
            }
        }
        return $files;
    }

    /**
     * Get the URL for a specific file within the site.
     */
    public function getFileUrl(string $filePath): string
    {
        return Storage::disk('sites')->url($this->storage_directory . '/' . $filePath);
    }

    /**
     * Store a file for the site.
     */
    public function storeFile($file, string $fileName = null): string|false
    {
        if (!$fileName) {
            $fileName = $file->getClientOriginalName();
        }
        return Storage::disk('sites')->putFileAs($this->storage_directory, $file, $fileName);
    }

    /**
     * Delete a file from the site.
     */
    public function deleteFile(string $filePath): bool
    {
        return Storage::disk('sites')->delete($this->storage_directory . '/' . $filePath);
    }
}