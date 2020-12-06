<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ulama;


class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(Request $request, string $page)
    {
        $ulama = Ulama::when($request->keyword, function ($query) use ($request) {
            $query->where('nama_ulama', 'like', "%{$request->keyword}%")
                ->orWhere('tempat_lahir', 'like', "%{$request->keyword}%");
        })->paginate(10);
    
        $ulama->appends($request->only('keyword'));
        
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}", compact('ulama'));
        }

        return abort(404);
    }

    public function lihatbiografi(Request $request, string $page)
    {
        $ulama = Ulama::when($request->keyword, function ($query) use ($request) {
            $query->where('nama_ulama', 'like', "%{$request->keyword}%")
                ->orWhere('tempat_lahir', 'like', "%{$request->keyword}%");
        })->paginate(10);
    
        $ulama->appends($request->only('keyword'));
        
        return view("pages/biografi", compact('ulama'));

    }

    public function tambahdata(Request $request, string $page)
    {
        $ulama = Ulama::when($request->keyword, function ($query) use ($request) {
            $query->where('nama_ulama', 'like', "%{$request->keyword}%")
                ->orWhere('tempat_lahir', 'like', "%{$request->keyword}%");
        })->paginate(10);
    
        $ulama->appends($request->only('keyword'));

        $this->validate($request,[
            'namaulama' => 'required',
            'tahunlahir' => 'required',
            'tempatlahir' => 'required',
            'biografi' => 'required'
        ]);

        $id = Ulama::create([
            'nama_ulama' =>$request->namaulama,
            'tahun_lahir' =>$request->tahunlahir,
            'tempat_lahir' => $request->tempatlahir,
            'biografi' => $request->biografi
        ]);

        return view("pages/daftar_ulama");
        
    }
}
