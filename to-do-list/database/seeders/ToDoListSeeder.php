<?php

namespace Database\Seeders;

use App\Models\ToDoList;
use App\Models\User;
use Illuminate\Database\Seeder;

class ToDoListSeeder extends Seeder
{
    public function run(): void
    {
        User::all()->each(function (User $user) {
            ToDoList::factory()->count(random_int(5, 8))->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
