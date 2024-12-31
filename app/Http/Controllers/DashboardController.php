<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard.
     */
    public function dashboard()
    {
        // Ambil semua berita terbaru, beserta relasi user dan komentar
        $news = News::with(['user', 'comments.user'])->orderBy('created_at', 'desc')->get();

        // Kirim data ke view
        return view('dashboard', compact('news'));
    }
}
