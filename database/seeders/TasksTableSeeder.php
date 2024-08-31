<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = DB::table('projects')->first();

        DB::table('tasks')->insert([
            'project_id' => $project->id,
            'task_name' => 'タスク名1',
            'task_status' => 0,
            'due_date' => date('Y-m-d H:i:s', strtotime("1 day")),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('tasks')->insert([
            'project_id' => $project->id,
            'task_name' => 'タスク名2',
            'task_status' => 1,
            'due_date' => date('Y-m-d H:i:s', strtotime("2 day")),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('tasks')->insert([
            'project_id' => $project->id,
            'task_name' => 'タスク名3',
            'task_status' => 2,
            'due_date' => date('Y-m-d H:i:s', strtotime("3 day")),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('tasks')->insert([
            'project_id' => $project->id,
            'task_name' => 'タスク名4',
            'task_status' => 3,
            'due_date' => date('Y-m-d H:i:s', strtotime("4 day")),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
