<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
        return view('student-profile.edit', [
            'studentProfile' => $request->user()->studentProfile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nis'        => ['required', 'string', 'max:30'],
            'major'      => ['required', 'string', 'max:100'],
            'class'      => ['required', 'string', 'max:50'],
            'phone'      => ['required', 'string', 'max:20'],
            'birth_date' => ['required', 'date'],
            'address'    => ['required', 'string'],
            'photo'      => ['nullable', 'image', 'max:2048'],
        ]);

        $studentProfile = $request->user()->studentProfile;

        $isComplete =
            filled($validated['nis']) &&
            filled($validated['major']) &&
            filled($validated['class']) &&
            filled($validated['phone']) &&
            filled($validated['birth_date']) &&
            filled($validated['address']);

        $studentProfile->update([
            'nis' => $validated['nis'],
            'major' => $validated['major'],
            'class' => $validated['class'],
            'phone' => $validated['phone'],
            'birth_date' => $validated['birth_date'],
            'address' => $validated['address'],
            'is_profile_complete' => $isComplete,
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
