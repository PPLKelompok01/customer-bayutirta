<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Layanan;

class ServiceController extends Controller
{
    public function index()
    {
        $layanans = Layanan::where('status', '=', 1)->get();
        return view('service',[
            'layanan' => $layanans]);
    }

    public function servicedetail(string $id)
    {
        $detail = Layanan::where('id_layanan', '=', $id)->first();
        return view('servicedetail',[
            'detail'=>$detail
        ]);
    }
}