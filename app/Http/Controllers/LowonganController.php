<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Lowongan;

class LowonganController extends Controller
{
    public function index()
    {
        $lowongans = Lowongan::all();
        return view('Lowonganview', [
            'lowongan' => $lowongans
        ]);
    }

    public function lowongandetail(string $id)
    {
        $detail = Lowongan::where('id_lowongan', '=', $id)->first();
        return view('Lowongandetail', [
            'detail' => $detail
        ]);
    }
}