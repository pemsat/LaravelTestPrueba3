<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'user_id' => 1
        ]);

        DB::table('tasks')->insert([
            'title' => 'Tarea2',
            'description' => 'No soy yo',
            'user_id' => 1
        ]);
        DB::table('tasks')->insert([
            'title' => 'Tarea3',
            'description' => 'Es Pepe',
            'user_id' => 1
        ]);
    }
}
