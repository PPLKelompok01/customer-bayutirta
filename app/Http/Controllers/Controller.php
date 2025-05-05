<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Controllers\UlasanController;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Layanan;
use App\Models\Reservasi;
use App\Models\Artikel;
use App\Models\Faq;
use App\Models\Ulasan;

class Controller extends BaseController
{
    public function index()
    {
        $response = file_get_contents('https://maps.googleapis.com/maps/api/place/details/json?placeid=ChIJ-4NA1pSdeC4R5ik3KRItaq8&key=AIzaSyBGr_Mzjw025m1jTs-YnbWMXVNeQ1WgCjw');
        $response = json_decode($response);
        $layanan = Layanan::where('status', '=', 1)->get();
        $faqs = Faq::all();
        $layanans = Layanan::where('status', '=', 1)->take(3)->get();
        $artikel = Artikel::all()->take(3);
        // return response()->json([
        //             'layanan' => $layanans,
        //             'artikel' => $artikel,
        //             'ulasan' => $ulasan]);
        return view('home',[
            'layanan' => $layanans,
            'artikel' => $artikel,
            'faq'=> $faqs,
            'pilihan' => $layanan,
            'ulasan' => $response->result->reviews
            ]);
    }

    public function addReservasi(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'layanan' => 'required',
            'name' => 'required|max:255',
            'no_telp' => 'required',
            'alamat' => 'required',
            'merk_hp' => 'required'
        ]);

        $id_layanan = Layanan::where('nama_layanan','=', $request->layanan)->first();
        // dd($id_layanan);

        if (isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])) {
            $file= $request->file('foto');
            $filename= date('YmdHi').$file->getClientOriginalName()[0];
            $file->move(public_path('images/reservasi'), $filename);
            $post = new Reservasi([
                'id_layanan' => $id_layanan->id_layanan,
                'name' => $validatedData['name'],
                'no_telp' => $validatedData['no_telp'],
                'alamat' => $validatedData['alamat'],
                'merk_hp' => $validatedData['merk_hp'],
                'keterangan' => $request['keterangan'],
                'foto' => $filename,
                'status' => "Belum Dikonfirmasi",
                'created_at' => now()
            ]);
        }else{

        // Create a new Post instance with the validated data
        $post = new Reservasi([
            'id_layanan' => $id_layanan->id_layanan,
            'name' => $validatedData['name'],
            'no_telp' => $validatedData['no_telp'],
            'alamat' => $validatedData['alamat'],
            'merk_hp' => $validatedData['merk_hp'],
            'keterangan' => $request['keterangan'],
            'status' => "Belum Dikonfirmasi",
            'created_at' => now()
        ]);
        }

        $post->save(); // Save the new post to the database

        // return redirect('/',[
        //     'message' => 'Data Berhasil Dikirim!',
        // ]); // Return the new post as JSON
        return redirect()->back()->with('message', 'Reservasi kamu berhasil terkirim.');

    }


    public function status(Request $request)

    {
        // echo $request->status;
        $url = "https://rbm-borneo.com/Store/BAYUTIRTA/cekresi";

        $curl =curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $data = array(
        'invoice' => $request->status
        );

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($curl);
        curl_close($curl);


        return $response;

    }
}
