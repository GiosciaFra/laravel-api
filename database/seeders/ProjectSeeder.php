<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = config("projects");


        foreach ($projects as $project) {
            $newProject = new Project();

            $newProject->name = $project['name'];
            $newProject->description = $project['description'];
            $newProject->preview = $project['preview'];
            $newProject->link = $project['link'];
            $newProject->slug = Str::slug($newProject->name);

            $newProject->save();
        }
    }
}
