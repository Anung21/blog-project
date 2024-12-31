<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Menampilkan daftar berita.
     */
    public function index()
    {
        // Ambil semua berita, urutkan berdasarkan created_at terbaru
        $news = News::with(['user', 'comments.user'])->orderBy('created_at', 'desc')->get();

        $title = 'News List';
        return view('news.index', compact('news', 'title'));
    }

    /**
     * Menampilkan form untuk membuat berita baru.
     */
    public function create()
    {
        $title = "Create News";
        return view('news.create', compact('title'));
    }

    /**
     * Menyimpan berita baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Menyimpan berita baru
        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(), // Mengambil ID pengguna yang login
        ]);

        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    public function show(News $news)
    {
        // Load relasi user dan comments
        $news->load(['user', 'comments.user']);

        return view('news.show', compact('news'));
    }

}
