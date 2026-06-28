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
        'description',
        'category_id',
        'user_id',
        'thumbnails',
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

    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function getVersionLabelAttribute(): string
    {
        return 'v'.$this->version;
    }

    public function screenshots()
    {
        return $this->hasMany(ProjectScreenshot::class)
            ->orderBy('sort_order');
    }
}
