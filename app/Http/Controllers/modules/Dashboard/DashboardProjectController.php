<?php

namespace App\Http\Controllers\modules\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $projects = Project::query()
            ->filter(request(['search', 'category', 'user']))
            ->where('user_id', $user->id)
            ->withTrashed()
            ->latest()
            ->paginate(9)->withQueryString();

        return view('components.dashboard.projects', [
            "title"  => "My Projects",
            "header" => "My Projects",
            'projects'  => $projects,
            'categories' => Category::select('id', 'name')->get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Generate slug unik
        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;

        // Periksa apakah slug sudah ada di database
        while (Project::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        // Simpan data
        $post = new Project();
        $post->name = $request->name;
        $post->slug = Str::slug($slug, '-');
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::id();
        // $data = $post;
        // dd($data);
        $post->save();


        return redirect('/dashboard/projects')->with('success', 'Postingan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('components.dashboard.project', [
            "title"  => "My Project",
            "header" => "Detail Project: " .  $project->name,
            'project'  => $project,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Cek apakah title berubah, jika berubah maka slug akan diperbarui
        if ($request->name !== $project->name) {
            $slug = Str::slug($request->name);
            $originalSlug = $slug;
            $count = 1;

            // Periksa apakah slug sudah ada di database
            while (Project::where('slug', $slug)->where('id', '!=', $project->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
            $project->slug = $slug;
        }

        // Update data
        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect('/dashboard/projects')->with('success', 'Postingan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete(); // Soft delete

        return redirect('/dashboard/projects')->with('success', 'Postingan berhasil dihapus (soft delete)!');
    }


    public function restore($id)
    {
        $post = Project::withTrashed()->findOrFail($id);
        $post->restore();

        return redirect('/dashboard/projects')->with('success', 'Postingan berhasil dikembalikan!');
    }
}
