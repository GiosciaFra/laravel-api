<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {

        $project = Project::with(['type', 'technologies'])->paginate(2);

        return response()->json([
            "success" => true,
            "results" => $project
        ]);
    }

    public function show($slug)
    {
        $project = Project::with(['type', 'technologies'])->where('slug', '=', $slug)->first();

        if ($project) {
            return response()->json([
                "success" => true,
                "project" => $project
            ]);
        } else {
            return response()->json([
                "success" => false,
                "error" => "Project not found"
            ]);
        }
    }
}
