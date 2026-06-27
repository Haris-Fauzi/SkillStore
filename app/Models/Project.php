<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Str;

class Project extends Model
{
    //
    protected $table = 'projects';

    protected $fillable = [
        'title',
        'deskripsi',
        'category_id',
        'siswa_id',
        'thumbnail',
        'file_project',
        'status',
        'version',
        'github_url',
        'demo_url',
        'year',
        'download_count',
        'slug',
        'view_count',
        'is_featured',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::creating(function ($project) {
            $project->slug = Str::slug($project->title);
        });

        static::updating(function ($project) {
            $project->slug = Str::slug($project->title);
        });
    }
}
