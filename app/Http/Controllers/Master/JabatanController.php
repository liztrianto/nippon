<?php

namespace App\Http\Controllers\Master;

use App\Models\Jabatan;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class JabatanController extends Controller
{
    public function index(){
        $departemens = Departemen::OrderBy('nama_departemen', 'ASC')->get();
        $jabatans = DB::table('m_jabatan')
        ->leftJoin('m_departemen as dept', 'm_jabatan.dept_id', '=', 'dept.id')
        ->select([
            'm_jabatan.*',
             'dept.nama_departemen' 
        ])->orderBy('dept_id', 'ASC')->get();
        return view('masters.jabatan', compact('jabatans','departemens'));
    }

    public function store(Request $request){
        $jabatans = new Jabatan;
        $jabatans->dept_id = $request->dept_id;
        $jabatans->jabatan = $request->jabatan;
        $jabatans->status = $request->status;
        $jabatans->save();

        return redirect()->route('jabatan.index')->with('success', 'Data jabatan berhasil ditambahkan');
    }

    public function update(Request $request, $id){
        $jabatans = Jabatan ::find($id);
        $jabatans->dept_id = $request->dept_id;
        $jabatans->jabatan = $request->jabatan;
        $jabatans->status = $request->status;
        $jabatans->save();

        return redirect()->route('jabatan.index')->with('success', 'Data jabatan berhasil diupdate');
    }

    public function getjabatan(Request $request, $dept_id){
        
        if ($request->ajax()) {

            $term = trim($request->term);

            $models = DB::table('m_jabatan')->select('id','jabatan as text')
            ->where('dept_id', $dept_id)
            ->where('jabatan', 'LIKE',  '%'.$term.'%')
            ->orderBy('jabatan', 'ASC')->simplePaginate(10);
           
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

    public function destroy($id){
        $jabatans = Jabatan ::find($id);
        $jabatans->delete();

        return redirect()->route('jabatan.index')->with('success', 'Data jabatan berhasil dihapus');
    }
}
