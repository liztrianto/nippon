<?php

namespace App\Http\Controllers\Master;
use DB; 
use Illuminate\Support\Facades\Auth;
use App\Models\Toko;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TokoController extends Controller
{
    public function index(){
        $login = Auth::user();
        $tokos = Toko::OrderBy('nama_toko', 'ASC')
        ->where('depo_id','=',$login->depo_id)->get();
        // $tokos = DB::table('m_toko')
        //             ->leftJoin('m_depo as depo','m_toko.depo_id','=','depo.id')
        //            ->select([
        //                 'm_toko.*',
        //                 'depo.nama_depo','depo.id'
        //             ])->get();
        return view('masters.toko', compact('tokos'));
    }

    public function store(Request $request){
        $login = Auth::user();
        $toko = new Toko;
        $toko->kode_sap = $request->kode_sap;
        $toko->nama_toko = $request->nama_toko;
        $toko->alamat = $request->alamat;
        $toko->kota = $request->kota;
        $toko->nama_pemilik = $request->nama_pemilik;
        $toko->no_telp = $request->no_telp;
        $toko->status = $request->status;
        $toko->depo_id = $login->depo_id;
        $toko->save();

        return redirect()->route('toko.index')->with('success', 'Data Toko berhasil ditambahkan');
    }

    public function update(Request $request, $id){
        $toko = Toko::find($id);
        $toko->kode_sap = $request->kode_sap;
        $toko->nama_toko = $request->nama_toko;
        $toko->alamat = $request->alamat;
        $toko->kota = $request->kota;
        $toko->nama_pemilik = $request->nama_pemilik;
        $toko->no_telp = $request->no_telp;
        $toko->status = $request->status;
        $toko->save();

        return redirect()->route('toko.index')->with('success', '<button type="button" class="btn btn-success swalDefaultSuccess">
        Launch Success Toast
      </button>');
    }

    // public function destroy($id){
    //     $cabang = Cabang::find($id);
    //     $cabang->delete();

    //     return redirect()->route('cabang.index')->with('success', 'Data cabang berhasil dihapus');
    // }
}
