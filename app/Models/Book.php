<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // protected $table = 'managebook';
    protected $table = 'books';
    
    protected $fillable = [
        'title',
        'author',
        'cover_image',
        'price',
        // 'price',
        'published_date',
        '_deleted'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        // 'published_date' => 'date',
        'published_date' => 'date:Y-m-d',
        '_deleted' => 'boolean'
    ];

    protected static function booted()
    {
        static::addGlobalScope('notDeleted', function ($builder) {
            $builder->where('_deleted', 0);
        });
    }

    public function scopeSearch($query, $search)
    {
        // if ($search) {
        if ($search) {
            return $query->where('title', 'like', "%{$search}%")
                        ->orWhere('author', 'like', "%{$search}%");
        }
        return $query;
    }
}