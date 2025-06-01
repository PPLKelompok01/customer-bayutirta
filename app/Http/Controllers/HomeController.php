<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SelectedUlasan;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil ulasan yang sudah dipilih oleh admin
        $selectedUlasans = SelectedUlasan::where('id_displayed', 1)
                                       ->orderBy('created_at', 'desc')
                                       ->get();

        return view('home', compact('selectedUlasans'));
    }
} 