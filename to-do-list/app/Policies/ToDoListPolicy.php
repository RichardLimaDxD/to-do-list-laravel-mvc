<?php

namespace App\Policies;

use App\Models\ToDoList;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ToDoListPolicy
{
    public function update(User $user, ToDoList $todolist)
    {
        return $todolist->user_id === $user->id
            ? Response::allow()
            : Response::deny('You are not the owner of this to do list');
    }
}
