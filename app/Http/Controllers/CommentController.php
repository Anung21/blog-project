<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Simpan komentar baru.
     */
    public function store(Request $request, News $news)
    {
        // Validasi input
        $request->validate([
            'suggestion' => 'required|max:255',
        ]);

        // Simpan komentar ke database
        $news->comments()->create([
            'suggestion' => $request->suggestion,
            'user_id' => Auth::id(), // Mengambil ID pengguna yang login
        ]);

        return back()->with('success', 'Comment added successfully.');
    }
}
