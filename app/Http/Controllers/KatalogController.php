<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Katalog;
use App\Models\KatalogDiskusi;

class KatalogController extends Controller
{
    public function index()
    {
        $katalogs = Katalog::all();
        return view('Katalogview', [
            'katalog' => $katalogs
        ]);
    }

    public function katalogdetail(string $id)
    {
        $sort = request('sort', 'terbaru'); // default sort adalah 'terbaru'
        $detail = Katalog::where('id_penjualan', '=', $id)->first();
        $diskusi = KatalogDiskusi::where('id_penjualan', '=', $id)
        ->orderBy('created_at', $sort == 'terbaru' ? 'desc' : 'asc')
        ->get();
        
        return view('katalogdetail', [
            'detail' => $detail,
            'diskusi' => $diskusi
        ]);
    }

    
    public function katalogDiskusi(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'isi' => 'required'
        ]);

        $post = new KatalogDiskusi([
            'id_penjualan' => $id,
            'name' => $validatedData['name'],
            'isi' => $validatedData['isi'], 
            'created_at' => now()
        ]);

        $post->save();
        return redirect()->back();
    }

    public function deleteDiskusi(string $id)
    {
        $diskusi = KatalogDiskusi::where('id_diskusi', '=', $id)->first();
        $id_penjualan = $diskusi->id_penjualan;
        KatalogDiskusi::where('id_diskusi', '=', $id)->delete();
        return redirect('katalogdetail/' . $id_penjualan);
    }
}