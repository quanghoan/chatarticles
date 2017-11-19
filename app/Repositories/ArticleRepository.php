<?php

namespace App\Repositories;

use App\User;

class ArticleRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->articles()
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}