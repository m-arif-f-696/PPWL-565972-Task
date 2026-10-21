<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Project::truncate(); // Clear existing data before seeding

        // draft
        for ($i = 1; $i <= 100; $i++) {
            Project::create([
                'title' => 'Project ' . $i,
                'description' => 'Description for Project ' . $i,
                'tech' => 'Tech ' . $i,
            ]);
        }
        // published
        for ($i = 101; $i <= 200; $i++) {
            Project::create([
                'title' => 'Project ' . $i,
                'description' => 'Description for Project ' . $i,
                'tech' => 'Tech ' . $i,
                'status' => 'published', // Set status to published for projects 1-10
            ]);
        }

        // soft delete

        for ($i = 201; $i <= 250; $i++) {
            Project::create([
                'title' => 'Project ' . $i,
                'description' => 'Description for Project ' . $i,
                'tech' => 'Tech ' . $i
            ])->delete(); // Soft delete the project
        }
    }
}
