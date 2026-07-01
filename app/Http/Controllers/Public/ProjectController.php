<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    //
    public function index(Request $request)
{
    // Project Catalog
    $projects = Project::with(['user', 'category'])
        ->where('status', 'Published')
        ->when($request->search, function ($query) use ($request) {
            $query->where('title', 'like', '%' . $request->search . '%');
        })
        ->latest()
        ->paginate(12)
        ->withQueryString();

    // Featured Project
    $featuredProjects = Project::with(['user', 'category'])
    ->where('is_featured', 1)
    ->orderByDesc('download_count')
    ->take(4)
    ->get();

    // Latest Project
    $latestProjects = Project::with(['user', 'category'])
        ->where('status', 'Published')
        ->latest()
        ->take(6)
        ->get();

    // Statistics
    $statistics = [
        'projects' => Project::where('status', 'Published')->count(),
        'downloads' => Project::where('status', 'Published')->sum('download_count'),
        'members' => User::count(),
        'categories' => Category::count(),
    ];

    // Categories
    $categories = Category::withCount([
        'projects' => function ($query) {
            $query->where('status', 'Published');
        }
    ])
    ->orderBy('category_name')
    ->get();

    return view('projects.index', compact(
        'projects',
        'featuredProjects',
        'latestProjects',
        'statistics',
        'categories'
    ));
}
    
    public function show(Project $project)
    {
        abort_unless($project->status === 'Published', 404);

        $project->load([
            'user',
            'category',
            'screenshots',
        ]);

        return view('projects.show', compact('project'));
    }

    public function download(Project $project)
    {
        abort_unless($project->status === 'Published', 404);

        if (! Storage::disk('public')->exists($project->file_project)) {
            abort(404);
        }

        // Tambah counter
        $project->increment('download_count');

        return response()->download(
            Storage::disk('public')->path($project->file_project)
        );
    }
}
