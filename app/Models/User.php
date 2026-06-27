<?php

namespace App\Models;
use App\Models\StudentProfile;
use App\Models\TeacherProfile;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable([
    'identity_number',
    'name', 
    'email', 
    'password', 
    'role', 
    'status'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => 'string',
            'status' => 'string',
        ];
    }

    // Relationships
    public function studentProfile(): HasOne
    {
        return $this->hasOne(StudentProfile::class);
    }

    public function teacherProfile(): HasOne
    {
        return $this->hasOne(TeacherProfile::class);
    }

    // Role Helpers
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isSiswa(): bool
    {
        return $this->role === 'siswa';
    }

    public function isGuru(): bool
    {
        return $this->role === 'guru';
    }

    // Status Helpers
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }

    // Profile Helpers
    public function profile(): StudentProfile|TeacherProfile|null
    {
        if ($this->isSiswa()) {
            return $this->studentProfile;
        }

        if ($this->isGuru()) {
            return $this->teacherProfile;
        }

        return null;
    }

    public function hasProfile(): bool
    {
        return $this->profile() !== null;
    }

    public function hasCompletedProfile(): bool
    {
        return $this->profile()?->is_profile_complete ?? false;
    }

}
