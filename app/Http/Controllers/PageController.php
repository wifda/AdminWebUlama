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
    public function index(Request $request,string $page)
    {
        $ulama = Ulama::when($request->keyword, function ($query) use ($request) {
            $query->where('nama_ulama', 'like', "%{$request->keyword}%")
                ->orWhere('tempat_lahir', 'like', "%{$request->keyword}%");
        })->paginate(10);
    
        $ulama->appends($request->only('keyword'));
        
        //$ulama = DB::table('ulama')->paginate(10);
        //$ulama = Ulama::all();

        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}", compact('ulama'));
        }

        return abort(404);
    }
}
