<?php

namespace App\Http\Controllers\modules\Post;

// Tetap extend dari Controller utama, sehingga tetap bisa menggunakan middleware atau fitur lainnya.
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index()
    {
        Log::info('[PostController] - [index]');

        // Membuat instance query builder agar Anda bisa membangun query secara bertahap sebelum dieksekusi.
        $posts = Post::query()
            ->filter(request(['search', 'category', 'user']))
            ->latest()
            ->paginate(9)->withQueryString();
        // withQueryString: Agar parameter pencarian tetap ada saat pengguna pindah halaman.

        return view('posts', [
            'title'  => 'Posts Page',
            'isi'    => 'lorem ipsum',
            'header' => 'Welcome Projects Page',
            'posts'  => $posts,
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title"  => "Single Blog",
            "header" => "Single Blog",
            "post"   => $post
        ]);
    }

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

        return redirect('/posts')->with('success', 'Postingan berhasil ditambahkan!');
    }
}
