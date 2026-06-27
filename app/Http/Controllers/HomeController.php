<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::query()
            ->where('is_featured', true)
            ->latest()
            ->take(3)
            ->get();

        $latestProjects = Project::query()
            ->latest()
            ->take(6)
            ->get();

        return view(
            'home',
            compact('featuredProjects', 'latestProjects')
        );
    }

    public function projects(Request $request)
    {
        $query = Project::query();

        // Search
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('deskripsi', 'like', '%' . $request->search . '%')
                ->orWhereHas('siswa', function ($q2) use ($request) {
                    $q2->where('name', 'like', '%' . $request->search . '%');
                });
            });
        }

        // Filter category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $projects = $query->latest()->paginate(12);
        $categories = Category::orderBy('category_name')->get();

        return view('projects.index', compact('projects', 'categories'));
    }

    public function showProject(Project $project)
    {
        $project->increment('view_count');

        return view('projects.show', compact('project'));
    }

    public function downloadProject(Project $project)
    {
        // ambil file dari database
        if (!$project->file_project || !Storage::exists($project->file_project)) {
        abort(404, 'File tidak ditemukan');
    }
        // increment download counter (nanti Sprint 3.5 lebih proper)
        $project->increment('download_count');

        return Storage::download($project->file_project, $project->title . '.zip');
    }
    
}