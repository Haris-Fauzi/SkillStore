<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    //
    public function index(Request $request)
    {
        $projects = Project::with(['user', 'category'])
            ->where('status', 'Published')
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('projects.index', compact('projects'));
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
