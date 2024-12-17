<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            'title' => 'Tarea1',
            'description' => 'El mensajero del mensajero de dios',
        ]);
        $user = User::find(1);
        $user->sharedTasks()->attach(1, ['permission' => 'owner']);

        DB::table('tasks')->insert([
            'title' => 'Tarea2',
            'description' => 'No soy yo',
        ]);
        $user = User::find(1);
        $user->sharedTasks()->attach(2, ['permission' => 'owner']);

        DB::table('tasks')->insert([
            'title' => 'Tarea3',
            'description' => 'Es Pepe',
        ]);
        $user = User::find(1);
        $user->sharedTasks()->attach(3, ['permission' => 'owner']);
    }
}
