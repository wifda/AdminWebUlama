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

        return redirect('/daftar_ulama')->with('info','Berhasil menambahkan data ulama!');
        // return view("pages/daftar_ulama", compact('ulama'));
        
    }

    public function edit($id){
        // $ulama = DB::table('ulama')->where('ulama_id',$id)->get();
        $ulama = Ulama::find($id);
        // return view("pages/form_updatedata", compact('ulama'));
        // echo $ulama;
        // return view('edit',['pegawai' => $pegawai]);
        return view('pages/form_updatedata', ['ulama' => $ulama]);
    }

    public function update(Request $request){
        
        DB::table('ulama')->where('ulama_id', $request->id)->update([
            'nama_ulama' => $request->input('nama_ulama'),
            'tahun_lahir' => $request->input('tahun_lahir'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'biografi' => $request->input('biografi')
        ]);

        // echo $request->id;
        // echo $request->namau_lama;
        // echo $request->tahun_lahir;
        // echo $request->tempat_lahir;
        // echo $request->biografi;
        
        return redirect('/daftar_ulama')->with('success','Berhasil mengupdate data ulama!');
    }

    public function editbiografi($id){
        $ulama = Ulama::find($id);
        return view('pages/form_updatedatabio', ['ulama' => $ulama]);
    }

    public function updatebiografi(Request $request){
        
        DB::table('ulama')->where('ulama_id', $request->id)->update([
            'nama_ulama' => $request->input('nama_ulama'),
            'tahun_lahir' => $request->input('tahun_lahir'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'biografi' => $request->input('biografi')
        ]);

        return redirect('/biografi')->with('success','Berhasil menambahkan data ulama!');
    }

    public function hapus($id){
        $ulama = Ulama::findOrFail($id);
        $ulama->delete();
        // DB::delete('delete from ulama where ulama_id = ?',[$id]);
        
        return redirect()->back()->with('error','Data ulama telah dihapus!');
    }
}
