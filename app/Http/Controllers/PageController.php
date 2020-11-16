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
    public function index(string $page)
    {
        $ulama = DB::table('ulama')->paginate(10);
        //$ulama = Ulama::all();

        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}", compact('ulama'));
        }

        return abort(404);
    }
}
