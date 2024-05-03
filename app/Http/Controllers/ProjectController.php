<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
// libreria str
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $request->validated();
        $newProject = new Project();


        if ($request->hasFile('preview')) {
            $path = Storage::disk('public')->put('previews', $request->preview);
            $newProject->preview = $path;
        };

        $newProject->fill($request->all());

        // salviamo lo slug
        $newProject->slug = Str::slug($request->name);

        $newProject->save();

        $newProject->technologies()->attach($request->technologies);

        return redirect()->route('admin.projects.index', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();

        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProjectRequest $request, Project $project)
    {
        $request->validated();


        if ($request->hasFile('preview')) {
            $path = Storage::disk('public')->put('previews', $request->preview);
            $project->preview = $path;
        };


        $project->update($request->all());
        // aggiorno lo slug
        $project->slug = Str::slug($request->name);

        $project->save();

        $project->technologies()->sync($request->technologies);

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
