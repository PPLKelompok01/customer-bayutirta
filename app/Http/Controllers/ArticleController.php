<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Artikel;
use App\Models\ArtikelKomentar;

class ArticleController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();
        return view('article',[
            'artikel' => $artikel
        ]);
    }

    public function articledetail(string $id)
    {
        $detail = Artikel::where('id_artikel', '=', $id)->first();
        $komentar = ArtikelKomentar::where('id_artikel', '=', $id)->get();
        $artikel = Artikel::where('id_artikel', '!=', $id)->orderBy('created_at')->take(3)->get();
        return view('articledetail',[
            'detail' => $detail,
            'komentar' => $komentar,
            'artikel' => $artikel
        ]);
    }

    public function articleSuka(Request $request, string $id)
{
    // Memeriksa apakah cookie 'liked_articles' ada dan mengandung ID artikel
    $likedArticles = $request->cookie('liked_articles', []);

    // Mengonversi JSON menjadi array jika tidak null
    if ($likedArticles) {
        $likedArticles = json_decode($likedArticles, true);
    } else {
        $likedArticles = [];
    }

    // Memeriksa apakah ID artikel sudah ada di array likedArticles
    if (in_array($id, $likedArticles)) {
        // Jika sudah menyukai, arahkan kembali dengan pesan
        return redirect()->back()->with('message', 'You have already liked this article.');
    } else {
        // Menambah like pada artikel
        Artikel::where('id_artikel', '=', $id)->increment('suka', 1);

        // Menambahkan ID artikel ke array likedArticles
        $likedArticles[] = $id;
        
        // Mengonversi array likedArticles ke JSON dan membuat cookie selama 1 tahun
        return redirect()->back()->withCookie(cookie('liked_articles', json_encode($likedArticles), 525600))->with('message', 'Thanks for liking the article!');
    }
}
    
    public function articleKomentar(Request $request,string $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'komentar' => 'required'
        ]);

        $post = new ArtikelKomentar([
            'id_artikel' => $id,
            'name' => $validatedData['name'],
            'komentar' => $validatedData['komentar'],
            'created_at' => now()
        ]);

        $post->save();
        return redirect()->back();
    }
}