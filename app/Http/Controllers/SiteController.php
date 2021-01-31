<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ulama;

class SiteController extends Controller
{
    //
    public function index(){
        $ulama = Ulama::all();
        return response()->json([
            'message' => 'berhasil',
            'ulama' => $ulama
        ], 200);
    }

    public function search($nama_ulama){
        $ulama = Ulama::where('nama_ulama', 'like', "%{$nama_ulama}%")->get();
        return response()->json([
            'message' => 'berhasil',
            'ulama' => $ulama
        ]);
    }

    // function actionIndex(){
    //     echo 'Server OK';
    // }

    // function actionTampilData(){
    //     $ulama = Ulama::all();
    //     // $data = array();
    //     echo $ulama;
    //     // foreach ($ulama as $ulama):
    //     //     $data[]=array(
    //     //         'nama_ulama' => $ulama['nama_ulama'],
    //     //         'tahun_lahir' => $ulama['tahun_lahir'],
    //     //         'tempat_lahir' => $ulama['tempat_lahir']
    //     //     );
    //     // endforeach;
    //     // echo json_encode(array(
    //     //     'hasil' => $data
    //     // ));
    // }
}

