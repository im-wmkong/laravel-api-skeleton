<?php

namespace App\Observers;

// retrieved, creating, created, updating, updated,
// saving, saved, deleting, deleted, restoring, restored
use App\Models\User;

class UserObserver
{
    public function deleting(User $user)
    {
        if ($user->is(request()->user())) {
            abort(400, 'You can\'t delete yourself');
        }
    }
}
