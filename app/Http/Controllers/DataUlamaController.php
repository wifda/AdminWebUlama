<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ulama;

class DataUlamaController extends Controller
{
    //
    public function index()
    {
        //
        $ulama = Ulama::all();
        return response()->json([
          'pesan' => 'berhasil',
          'ulama' => $ulama
        ], 200);
    }
    public function search($nama_ulama)
    {
      $ulama = Ulama::where('nama_ulama', 'like', "%{$nama_ulama}%")->get();
      return response()->json([
        'ulama' => $ulama
      ]);
    }
}
