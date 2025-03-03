<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable = ['name', 'slug', 'description', 'user_id', 'category_id'];
    protected $guarded = ['id'];
    protected $with = ['user', 'category'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query
            ->when(
                $filters['search'] ?? false,
                fn($query, $search) =>
                $query->where('name', 'like', "%$search%")
            )
            ->when(
                $filters['category'] ?? false,
                fn($query, $category) =>
                $query->whereHas('category', fn($query) => $query->where('slug', $category))
            )
            ->when(
                $filters['user'] ?? false,
                fn($query, $author) =>
                $query->whereHas('user', fn($query) => $query->where('username', $author))
            );
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('images/' . $this->image); // Jika ada gambar di database
        }

        // Jika tidak ada gambar, tampilkan gambar random dari Lorem Picsum
        return 'https://picsum.photos/500/280?random=' . rand(1, 1000);
    }
}
