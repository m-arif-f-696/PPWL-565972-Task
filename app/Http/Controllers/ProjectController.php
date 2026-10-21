<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $options = [5, 10, 15, 20, 25];
        $perPage = in_array((int) $request->per_page, $options) ? (int) $request->per_page : 5;
        $projects = Project::published()->paginate($perPage, ['*'], 'page')->withQueryString();
        return view('projects', compact('projects', 'perPage', 'options'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'tech' => 'required',
            'link' => 'nullable',
        ]);

        Project::create($request->all());

        return redirect()->route('projects.dashboard')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $project = Project::findOrFail($id);
        return view('form', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateRequest = $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'tech' => 'required',
            'link' => 'nullable',
        ]);

        $project = Project::findOrFail($id);
        $project->update($validateRequest);

        return redirect()->route('projects.dashboard')
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.dashboard')
            ->with('success', 'Project deleted successfully.');
    }

    public function dashboard(Request $request){
        $options = [4, 8, 12, 16, 20];
        $perPage = in_array((int) $request->per_page, $options) ? (int) $request->per_page : 4;
        $published = Project::published()->paginate($perPage, ['*'], 'published_page')->withQueryString();
        $drafts    = Project::draft()->paginate($perPage, ['*'], 'draft_page')->withQueryString();
        $trashed   = Project::trash()->paginate($perPage, ['*'], 'trashed_page')->withQueryString();
        return view('dashboard', compact('published', 'drafts', 'trashed', 'perPage', 'options'));
    }

    public function restore($id){
        $project = Project::onlyTrashed()->where('id', $id)->first();
        $project->restore();
        return redirect()->route('projects.dashboard')
            ->with('success', 'Project restored successfully.');
    }

    public function forceDelete($id){
        $project = Project::onlyTrashed()->where('id', $id)->first();
        $project->forceDelete();
        return redirect()->route('projects.dashboard')
            ->with('success', 'Project deleted successfully.');
    }

    public function publish($id){
        $project = Project::draft()->where('id', $id)->first();
        $project->status = 'published';
        $project->save();
        return redirect()->route('projects.index')
            ->with('success', 'Project published successfully.');
    }

    public function unpublish($id){
        $project = Project::published()->where('id', $id)->first();
        $project->status = 'draft';
        $project->save();
        return redirect()->route('projects.dashboard')
            ->with('success', 'Project unpublished successfully.');
    }

    
}
