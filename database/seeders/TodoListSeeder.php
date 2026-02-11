<?php

namespace Database\Seeders;

use App\Models\TodoList;
use Illuminate\Database\Seeder;

class TodoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $todos = [
            [
                'user_id' => 1,
                'title' => 'Buy groceries',
                'description' => 'Milk, eggs, bread, and vegetables',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'title' => 'Finish Laravel project',
                'description' => 'Complete Todo List API and authentication',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'title' => 'Read a book',
                'description' => 'Read at least 50 pages of a novel',
                'completed' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'title' => 'Exercise',
                'description' => 'Do 30 minutes of cardio',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'title' => 'Clean the house',
                'description' => 'Vacuum and dust all rooms',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'title' => 'Pay bills',
                'description' => 'Electricity and internet bills',
                'completed' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'title' => 'Call mom',
                'description' => 'Check on how she is doing',
                'completed' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'title' => 'Prepare presentation',
                'description' => 'For Monday team meeting',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'title' => 'Fix bike',
                'description' => 'Repair flat tire and oil chain',
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'title' => 'Meditate',
                'description' => '10 minutes morning meditation',
                'completed' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        TodoList::insert($todos);
    }
}
