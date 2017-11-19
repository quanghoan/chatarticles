<?php

namespace App\Policies;

use App\User;
use App\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can delete the given task.
     *
     * @param  User  $user
     * @param  Article  $article
     * @return bool
     */
    public function destroy(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }
}