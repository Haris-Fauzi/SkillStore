<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
// use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\ProjectScreenshot;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('dashboard.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::orderBy('category_name')->get();

        return view('dashboard.projects.create', compact('categories'));
    }

    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        // Simpan thumbnails
        if ($request->hasFile('thumbnails')) {
            $data['thumbnails'] = $request->file('thumbnails')
                ->store('thumbnails', 'public');
        }

        // Simpan file project
        if ($request->hasFile('file_project')) {
            $data['file_project'] = $request->file('file_project')
                ->store('projects', 'public');
        }

        // Owner project
        $data['user_id'] = Auth::id();

        // Status awal
        $data['status'] = 'Pending';

        // Project::create($data);
        $project = Project::create($data);

        if ($request->hasFile('screenshots')) {

            foreach ($request->file('screenshots') as $index => $image) {

                $project->screenshots()->create([

                    'image' => $image->store(
                        'screenshots',
                        'public'
                    ),

                    'sort_order' => $index + 1,

                ]);

            }

        }

        return redirect()
            ->route('dashboard.projects.index')
            ->with('success', 'Project berhasil dibuat.');
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        $categories = Category::orderBy('category_name')->get();

        $project->load('screenshots');

        return view(
            'dashboard.projects.edit',
            compact('project', 'categories')
        );
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        $data = $request->validated();

        /*
        |--------------------------------------------------------------------------
        | Thumbnail
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('thumbnails')) {

            if ($project->thumbnails && Storage::disk('public')->exists($project->thumbnails)) {
                Storage::disk('public')->delete($project->thumbnails);
            }

            $data['thumbnails'] = $request
                ->file('thumbnails')
                ->store('thumbnails', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | File Project
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('file_project')) {

            if ($project->file_project && Storage::disk('public')->exists($project->file_project)) {
                Storage::disk('public')->delete($project->file_project);
            }

            $data['file_project'] = $request
                ->file('file_project')
                ->store('projects', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Tambah Screenshot Baru
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('screenshots')) {

            $lastOrder = $project->screenshots()->max('sort_order') ?? 0;

            foreach ($request->file('screenshots') as $image) {

                $project->screenshots()->create([

                    'image' => $image->store(
                        'screenshots',
                        'public'
                    ),

                    'sort_order' => ++$lastOrder,

                ]);

            }

        }

        $project->update($data);

        return redirect()
            ->route('dashboard.projects.index')
            ->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        // Hapus thumbnail
        if ($project->thumbnails &&
            Storage::disk('public')->exists($project->thumbnails)) {

            Storage::disk('public')->delete($project->thumbnails);
        }

        // Hapus file project
        if ($project->file_project &&
            Storage::disk('public')->exists($project->file_project)) {

            Storage::disk('public')->delete($project->file_project);
        }

        foreach ($project->screenshots as $screenshot) {

            if (
                $screenshot->image &&
                Storage::disk('public')->exists($screenshot->image)
            ) {
                Storage::disk('public')->delete($screenshot->image);
            }

            $screenshot->delete();
        }

        $project->delete();

        return redirect()
            ->route('dashboard.projects.index')
            ->with('success', 'Project berhasil dihapus.');
    }

    public function destroyScreenshot(ProjectScreenshot $screenshot)
    {
        $project = $screenshot->project;

        $this->authorize('update', $project);

        if (
            $screenshot->image &&
            Storage::disk('public')->exists($screenshot->image)
        ) {
            Storage::disk('public')->delete($screenshot->image);
        }

        $screenshot->delete();

        return back()->with(
            'success',
            'Screenshot berhasil dihapus.'
        );
    }
}