<?php

namespace App\Http\Controllers\modules\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        // $projects = Project::query()
        //     ->filter(request(['search', 'category', 'user']))
        //     ->where('user_id', $user->id)
        //     ->withTrashed()
        //     ->latest()
        //     ->paginate(9)->withQueryString();

        return view('components.dashboard.user', [
            "title"  => "My Profile",
            "header" => "My Profile",
            'users'  => $user,
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
