<?php

namespace App\Http\Controllers\Master;

use App\Models\Depo;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DepartemenController extends Controller
{
    public function index(){
        $departemens = Departemen::OrderBy('nama_departemen', 'ASC')->get();
        return view('masters.departemen', compact('departemens'));
    }

    public function store(Request $request){
        $departemen = new Departemen;
        $departemen->nama_departemen = $request->nama_departemen;
        $departemen->kode_departemen = $request->kode_departemen;
        $departemen->status = $request->status;
        $departemen->save();

        return redirect()->route('departemen.index')->with('success', 'Data Departemen berhasil ditambahkan');
    }

    public function update(Request $request, $id){
        $departemen = Departemen::find($id);
        $departemen->nama_departemen = $request->nama_departemen;
        $departemen->kode_departemen = $request->kode_departemen;
        $departemen->status = $request->status;
        $departemen->save();

        return redirect()->route('departemen.index')->with('success', 'Data Departemen berhasil diupdate');
    }

    public function getdepartemen(Request $request){
        
        if ($request->ajax()) {

            $term = trim($request->term);

            $models = DB::table('m_departemen')->select('id','nama_departemen as text')
            ->where('nama_departemen', 'LIKE',  '%'.$term.'%')
            // ->where('id', '!=', 5)
            ->orderBy('nama_departemen', 'ASC')->simplePaginate(10);
           
            $morePages = true;

            if (empty($models->nextPageUrl())){
                $morePages = false;
            }

            $results = array(
                "results" => $models->items(),
                "pagination" => array(
                    "more" => $morePages
                )
            );
        
            return response()->json($results);
        }
    }

    public function getdept(Request $request){
        
        if ($request->ajax()) {

            $term = trim($request->term);

            $models = DB::table('m_departemen')->select('id','nama_departemen as text')
            ->where('nama_departemen', 'LIKE',  '%'.$term.'%')
            ->orderBy('nama_departemen', 'ASC')->simplePaginate(10);
           
            $morePages = true;

            if (empty($models->nextPageUrl())){
                $morePages = false;
            }

            $results = array(
                "results" => $models->items(),
                "pagination" => array(
                    "more" => $morePages
                )
            );
        
            return response()->json($results);
        }
    }
    // public function destroy($id){
    //     $cabang = Cabang::find($id);
    //     $cabang->delete();

    //     return redirect()->route('cabang.index')->with('success', 'Data cabang berhasil dihapus');
    // }
}
