<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /**
     * Kolom yang diizinkan untuk mass assignment.
     */
    protected $fillable = [
        'title',
        'content',
        'user_id', // Tambahkan jika Anda menyimpan user ID
    ];

    /**
     * Relasi ke User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Comments.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

}
