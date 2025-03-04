<?php

namespace App\Http\Controllers\modules\Project;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
            'categories' => Category::all()
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $slug = Str::slug($request->name);
        $imageName = null;

        if ($request->hasFile('image')) {
            // Membuat nama file unik dengan menambahkan timestamp (fungsi time()) + ekstensi gambar.
            // Contoh: 1709457890.jpg
            $imageName = time() . '.' . $request->image->extension();

            // Memindahkan file gambar dari temporary storage ke folder /public/images.
            // public_path('images') akan menghasilkan path: public/images
            $request->image->move(public_path('images'), $imageName);
        }

        Project::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'image' => $imageName,
        ]);

        return redirect('/projects')->with('success', 'Postingan berhasil ditambahkan!');
    }
}
