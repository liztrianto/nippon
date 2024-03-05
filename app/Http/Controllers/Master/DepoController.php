<?php

namespace App\Http\Controllers\Master;

use App\Models\Depo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DepoController extends Controller
{
    public function index(){
        // $depos = Depo::OrderBy('nama_depo', 'ASC')->get();
        $depos = DB::table('m_depo')
        ->leftJoin('users as kadepo', 'm_depo.kadepo_id', '=', 'kadepo.id')
        ->leftJoin('users as manager', 'm_depo.manager_id', '=', 'manager.id')
        ->select([
            'm_depo.*',
             'kadepo.name as nama_kadepo', 'manager.name as nama_manager' 
        ])->orderBy('nama_depo', 'ASC')->get();
        $kadepos = User::orderBy('name', 'ASC')->where([['name','!=','Administrator'],['jabatan_id','=',27]])->get();
        $managers = User::orderBy('name', 'ASC')->where([['name','!=','Administrator'],['jabatan','=','Manager'],['active','=','1']])->get();
        return view('masters.depo', compact('depos','kadepos','managers'));
    }

    public function store(Request $request){
        $depo = new Depo;
        $depo->nama_depo = $request->nama_depo;
        $depo->kode_depo = $request->kode_depo;
        // $depo->kadepo_id = $request->kadepo_id;
        $depo->status = $request->status;
        $depo->save();

        // toastr()->success('Your message here', 'Title');
        return redirect()->route('depo.index')->with('success', 'Data Depo berhasil ditambahkan');
    }

    public function update(Request $request, $id){
        $depo = Depo::find($id);
        $depo->nama_depo = $request->nama_depo;
        $depo->kode_depo = $request->kode_depo;
        $depo->kadepo_id = $request->kadepo_id;
        $depo->manager_id = $request->manager_id;
        $depo->status = $request->status;
        $depo->save();

        return redirect()->route('depo.index')->with('success', 'Data Depo berhasil diupdate');
    }

    public function getdepo(Request $request){
        
        if ($request->ajax()) {

            $term = trim($request->term);

            $models = DB::table('m_depo')->select('id','nama_depo as text')
            ->where('nama_depo', 'LIKE',  '%'.$term.'%')
            ->orderBy('nama_depo', 'ASC')->simplePaginate(10);
           
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
    public function getdepoall(Request $request){
        
        if ($request->ajax()) {

            $term = trim($request->term);

            $models = DB::table('m_depo')->select('nama_depo as id','nama_depo as text')
            ->where('nama_depo', 'LIKE',  '%'.$term.'%')
            ->orderBy('nama_depo', 'ASC')->simplePaginate(10);
           
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

    public function getdepot(Request $request, $idmanager){
        
        if ($request->ajax()) {

            $term = trim($request->term);

            $models = DB::table('m_depo')->select('nama_depo as id','nama_depo as text')
            ->where('manager_id', $idmanager)
            ->where('nama_depo', 'LIKE',  '%'.$term.'%')
            ->orderBy('nama_depo', 'ASC')->simplePaginate(10);
           
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
