<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;

class ProjectPolicy
{
    /**
     * User hanya boleh melihat project miliknya.
     */
    public function view(User $user, Project $project): bool
    {
        return $user->isAdmin() || $user->id === $project->user_id;
    }

    /**
     * User hanya boleh mengupdate project miliknya.
     */
    public function update(User $user, Project $project): bool
    {
        return $user->isAdmin() || $user->id === $project->user_id;
    }

    /**
     * User hanya boleh menghapus project miliknya.
     */
    public function delete(User $user, Project $project): bool
    {
        return $user->isAdmin() || $user->id === $project->user_id;
    }

    // public function viewAny(User $user): bool
    // {
    //     return $user->isAdmin();
    // }

    // public function create(User $user): bool
    // {
    //     return $user->isAdmin();
    // }
}