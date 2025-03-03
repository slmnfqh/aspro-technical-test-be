<?php

namespace App\Http\Controllers\modules\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::query()
            ->filter(request(['search', 'category', 'user']))
            ->latest()
            ->paginate(9)->withQueryString();

        return view('projects', [
            'title'  => 'Projects Page',
            'isi'    => 'lorem ipsum',
            'header' => 'Welcome Projects Page',
            'projects'  => $project,
            'categories' => Project::all()
        ]);
    }

    public function show(Project $project)
    {
        return view('project', [
            "title"  => "Single Project",
            "header" => "Single Project",
            "project"   => $project
        ]);
    }
}
