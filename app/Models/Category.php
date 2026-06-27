<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Category extends Model
{
    //
    protected $table = 'categories';

    protected $fillable = [
        'category_name',
        'slug',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
