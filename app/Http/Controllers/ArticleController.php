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
        $artikel = Artikel::where('id_artikel', '!=', $id)
                         ->orderBy('created_at')
                         ->take(3)
                         ->get(); // Max 3 related articles
        
        return view('articledetail', [
            'detail' => $detail,
            'komentar' => $komentar,
            'artikel' => $artikel
        ]);
    }

    public function articleSuka(Request $request, string $id)
    {
        $likedArticles = $request->cookie('liked_articles', []);
        
        if ($likedArticles) {
            $likedArticles = json_decode($likedArticles, true);
        } else {
            $likedArticles = [];
        }

        if (in_array($id, $likedArticles)) {
            return redirect()->back()
                           ->with('message', 'You have already liked this article.');
        } else {
            Artikel::where('id_artikel', '=', $id)->increment('suka', 1);
            $likedArticles[] = $id;
            
            return redirect()->back()
                           ->withCookie(cookie('liked_articles', json_encode($likedArticles), 525600))
                           ->with('message', 'Thanks for liking the article!');
        }
    }
    
    public function articleKomentar(Request $request, string $id) 
    {
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