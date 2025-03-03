<?php

namespace App\Http\Controllers\modules\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $posts = Post::query()
            ->filter(request(['search', 'category', 'user']))
            ->where('user_id', $user->id)
            ->withTrashed()
            ->latest()
            ->paginate(9)->withQueryString();

        return view('components.dashboard.posts', [
            "title"  => "My Posts",
            "header" => "My Posts",
            'posts'  => $posts,
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
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $slug = Str::slug($request->title);
        $imageName = null;

        if ($request->hasFile('image')) {
            // Membuat nama file unik dengan menambahkan timestamp (fungsi time()) + ekstensi gambar.
            // Contoh: 1709457890.jpg
            $imageName = time() . '.' . $request->image->extension();

            // Memindahkan file gambar dari temporary storage ke folder /public/images.
            // public_path('images') akan menghasilkan path: public/images
            $request->image->move(public_path('images'), $imageName);
        }

        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'image' => $imageName,
        ]);

        return redirect('/dashboard/posts
        ')->with('success', 'Postingan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('components.dashboard.post', [
            "title"  => "My Posts",
            "header" => "Detail Post: " .  $post->title,
            'post'  => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Cek apakah title berubah, jika berubah maka slug akan diperbarui
        if ($request->title !== $post->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;

            // Periksa apakah slug sudah ada di database
            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
            $post->slug = $slug;
        }

        // Update data
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
        ]);

        return redirect('/dashboard/posts')->with('success', 'Postingan berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete(); // Soft delete

        return redirect('/dashboard/posts')->with('success', 'Postingan berhasil dihapus (soft delete)!');
    }


    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();

        return redirect('/dashboard/posts')->with('success', 'Postingan berhasil dikembalikan!');
    }
}
