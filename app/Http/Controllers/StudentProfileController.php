<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

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
        return view('student-profile.edit', [
            'studentProfile' => $request->user()->studentProfile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        // 1. Validasi Input Data Profil & Password jika diisi
        $validated = $request->validate([
            'name'             => ['required', 'string', 'max:255'],
            'nis'              => ['required', 'string', 'max:30'],
            'major'            => ['required', 'string', 'max:100'],
            'class'            => ['required', 'string', 'max:50'],
            'phone'            => ['required', 'string', 'max:20'],
            'birth_date'       => ['required', 'date'],
            'address'          => ['required', 'string'],
            'photo'            => ['nullable', 'image', 'max:2048'],
            'current_password' => ['nullable', 'required_with:password', 'current_password'],
            'password'         => ['nullable', 'confirmed', Password::defaults()],
        ]);

        // 2. Update Nama pada tabel Users utama
        $user->update([
            'name' => $validated['name'],
        ]);

        // 3. Update Password jika user mengisi field password baru
        if (!empty($validated['password'])) {
            $user->update([
                'password' => Hash::make($validated['password']),
            ]);
        }

        // 4. Logika Handle Upload Foto Profil
        $profileData = [
            'nis'        => $validated['nis'],
            'major'      => $validated['major'],
            'class'      => $validated['class'],
            'phone'      => $validated['phone'],
            'birth_date' => $validated['birth_date'],
            'address'    => $validated['address'],
        ];

        if ($request->hasFile('photo')) {
            // Ambil data profile saat ini untuk mengecek foto lama
            $currentProfile = $user->studentProfile;

            // Hapus berkas foto lama jika ada di dalam folder storage
            if ($currentProfile && $currentProfile->photo && Storage::disk('public')->exists($currentProfile->photo)) {
                Storage::disk('public')->delete($currentProfile->photo);
            }

            // Simpan foto baru ke folder 'public/student_photos'
            $path = $request->file('photo')->store('student_photos', 'public');
            $profileData['photo'] = $path;
        }

        // 5. Kalkulasi kelengkapan profil siswa
        $isComplete = filled($validated['nis']) &&
                      filled($validated['major']) &&
                      filled($validated['class']) &&
                      filled($validated['phone']) &&
                      filled($validated['birth_date']) &&
                      filled($validated['address']);

        $profileData['is_profile_complete'] = $isComplete;

        // 6. Jalankan Eksekusi updateOrCreate Data Relasi Profile
        $user->studentProfile()->updateOrCreate(
            ['user_id' => $user->id],
            $profileData
        );

        return redirect()
            ->route('dashboard')
            ->with('success', 'Profil dan pengaturan akun berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}