<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Kolom yang diizinkan untuk mass assignment.
     */
    protected $fillable = [
        'suggestion', // Isi komentar
        'news_id',    // ID berita terkait
        'user_id',    // ID pengguna yang memberikan komentar
    ];

    /**
     * Relasi ke model News.
     */
    public function news()
    {
        return $this->belongsTo(News::class);
    }

    /**
     * Relasi ke model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
