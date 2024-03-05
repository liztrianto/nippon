<?php

namespace App\Http\Controllers\Signboard;

use DB; use Auth;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Signboard;
use App\Models\DetailSignboard;
use App\Models\Depo;
use App\Http\Controllers\Controller;

class ApprovalController extends Controller
{
    public function json()
    {   
        $user = Auth::user();
        $signboard = DB::table('signboards')->orderBy('tanggal_pengajuan', 'ASC')
        ->leftJoin('m_toko as toko', 'signboards.toko_id', '=', 'toko.id')
        ->leftJoin('users as pemohon', 'signboards.pemohon_id', '=', 'pemohon.id')
        // ->leftJoin('users as officer', 'signboards.officer_id', '=', 'officer.id')
        ->leftJoin('m_departemen as dept','pemohon.dept_id','=','dept.id')
        ->leftJoin('m_depo as depo','toko.depo_id','=','depo.id')
        ->leftJoin('users as pembuat', 'signboards.created_by', '=', 'pembuat.id')
        // ->leftJoin('users as updater', 'signboards.updated_by', '=', 'updater.id')
        ->select([
            'signboards.*',
            'toko.kode_sap as kode_sap','toko.nama_toko as nama_toko','toko.alamat as alamat',
            'toko.kota as kota',
            'toko.nama_pemilik','toko.no_telp',
             'dept.nama_departemen as dept', 'depo.nama_depo', 
             'depo.id as depo_id', 'depo.manager_id',
             'pembuat.name as pembuat' 
        ])
        ->where('depo.manager_id','=',$user->id)
        ->get();
        // return response()->json($signboards);
        // return view('signboard.approval', compact('signboards','depos'));
        
        
                
        
        return DataTables::of($signboard)
        ->addIndexColumn()
        ->editColumn('tanggal_pengajuan', function ($signboard){
            return date('d-M-Y', strtotime($signboard->tanggal_pengajuan));
        })
        ->addColumn('depo', function($signboard){
            if($signboard->depo_id == null){
                return '<i>(kosong)</i>';
            }

            return $signboard->nama_depo;
        })

        ->addColumn('action', function($signboard){
            return view('signboard.approval.action', [
                'model' => $signboard,
                'url_show' => route('approval.show', $signboard->id),
                'url_edit' => route('approval.edit', $signboard->id),
                // 'url_destroy' => route('controller.destroy', $signboard->id)
            ]);
        })
       
        // ->addColumn('action', 'signboard.actionsignboard') //mengambil dari blade view
        // ->editColumn('approve', 'signboard.buttonapproval') //mengambil dari blade view
        // ->addColumn('action', 'signboard.approval.button') //mengambil dari blade view
        // ->addColumn('approve', 'signboard.approval.modal') //mengambil dari blade view
        // ->rawColumns(['action'])
        ->rawColumns(['action','approve'])
        ->escapeColumns([]) //untuk mengaplikasikan html syntax
    ->make(true);

    }

    public function jsonall()
    {   
        $user = Auth::user();
        $signboard = DB::table('signboards')->orderBy('tanggal_pengajuan', 'ASC')
        ->leftJoin('m_toko as toko', 'signboards.toko_id', '=', 'toko.id')
        ->leftJoin('users as pemohon', 'signboards.pemohon_id', '=', 'pemohon.id')
        // ->leftJoin('users as officer', 'signboards.officer_id', '=', 'officer.id')
        ->leftJoin('m_departemen as dept','pemohon.dept_id','=','dept.id')
        // ->leftJoin('m_depo as depo','toko.depo_id','=','depo.id')
        ->leftJoin('m_depo as depo','signboards.depoid','=','depo.id')
        ->leftJoin('model_has_depos as relasi', 'depo.id', '=', 'relasi.depo_id')
        ->leftJoin('users as model', 'relasi.model_id', '=', 'model.id')
        ->leftJoin('users as pembuat', 'signboards.created_by', '=', 'pembuat.id')
        // ->leftJoin('users as updater', 'signboards.updated_by', '=', 'updater.id')
        ->select([
            'signboards.*',
            'toko.kode_sap as kode_sap','toko.nama_toko as nama_toko','toko.alamat as alamat',
            'toko.kota as kota',
            'toko.nama_pemilik','toko.no_telp',
             'dept.nama_departemen as dept', 'depo.nama_depo', 
             'depo.id as depo_id', 'depo.manager_id',
             'pembuat.name as pembuat' 
        ])
        ->where('model.id','=',$user->id)
        
        // ->where('depo.manager_id','=',$user->id)
        ->get();
        // return response()->json($signboards);
        // return view('signboard.approval', compact('signboards','depos'));
        
        
        // ->select([
        //     'signboards.*'
        // ])
        
                
        
        return DataTables::of($signboard)
        ->addIndexColumn()
        ->editColumn('tanggal_pengajuan', function ($signboard){
            return date('d-M-Y', strtotime($signboard->tanggal_pengajuan));
        })
        ->addColumn('depo', function($signboard){
            if($signboard->depo_id == null){
                return '<i>(kosong)</i>';
            }

            return $signboard->nama_depo;
        })

        ->addColumn('action', function($signboard){
            return view('signboard.approval.action', [
                'model' => $signboard,
                'url_show' => route('approval.show', $signboard->id),
                'url_edit' => route('approval.edit', $signboard->id),
                // 'url_destroy' => route('controller.destroy', $signboard->id)
            ]);
        })
       
        // ->addColumn('action', 'signboard.actionsignboard') //mengambil dari blade view
        // ->editColumn('approve', 'signboard.buttonapproval') //mengambil dari blade view
        // ->addColumn('action', 'signboard.approval.button') //mengambil dari blade view
        ->addColumn('approval', 'signboard.approval.modal') //mengambil dari blade view
        // ->rawColumns(['action'])
        ->rawColumns(['modal','approval','action'])
        
        ->escapeColumns([]) //untuk mengaplikasikan html syntax
    ->make(true);

    }

    public function index()
    {
        $login = Auth::user();
        $depos = DB::table('m_depo')->orderBy('nama_depo', 'ASC')
        ->leftJoin('model_has_depos as relasi', 'm_depo.id', '=', 'relasi.depo_id')
        ->leftJoin('users as model', 'relasi.model_id', '=', 'model.id')
      
        ->select([
            'm_depo.*'
        ])
        ->where('model.id','=',$login->id)
        ->get();
        // $depos = Depo::OrderBy('nama_depo', 'ASC')->get();
        return view('signboard.approval.index',  compact('depos'));
    }

    public function show($id)
    {
        // $model = Signboard::findOrFail($id);   
        // $model = Signboard::with(['toko','depo'])->where('id', $id)->first();     
        // $model1 = DetailSignboard::orderBy('id', 'ASC')->where('signboard_id', $model->id )->get();     
        // return view('signboard.approval.show', compact('model'));
        // return response()->json($model1);

        $model = Signboard::with(['toko','depo'])->where('id', $id)->first();     
        $detail = DetailSignboard::orderBy('id', 'ASC')->where('signboard_id', $model->id )->get();    
        return view('signboard.controller.show', compact('model','detail'));
    }

    public function showPhoto($id)
    {   
        
        $form = Signboard::findOrFail($id);       
        // return Storage::response("public/FormCuti/".$form->upload_file); 
        // $data =  Gdrive::get("signboard/foto/".$form->upload_foto);
        // $data =  Storage::disk('google')->get('signboard/foto/'.$form->upload_foto);  
       return  Storage::disk('google')->get('signboard/foto/'.$form->upload_foto); 
    

    }
    public function showFile($id)
    {   
        
        $form = Signboard::findOrFail($id);       
        // return Storage::response("public/FormCuti/".$form->upload_file);       
        // $data =  Gdrive::get("signboard/foto/".$form->upload_file);
        // $data =  Storage::disk('google')->get('signboard/file/'.$form->upload_file); 
        return Storage::disk('google')->get('signboard/file/'.$form->upload_file); 
          

    }

    public function approve(Request $request, $id)
    {
        $signboard = Signboard::findOrFail($id);
        $signboard->tanggal_approve = date(now());
        $signboard->catatan = $request->catatan;        
        switch ($request->input('action')) {
            case 'approve':
                // Save model
                $signboard->approve = 1;
                $signboard->save();
                return redirect(route('approval.index'))->with(['success' => 'Pengajuan Telah Diapprove']);
                break;
    
            case 'reject':
                // Preview model
                $signboard->approve = 2;
                $signboard->save();
                return redirect(route('approval.index'))->with(['success' => 'Pengajuan Telah Direject']);
                break;
    
        }

    }
    public function reject(Request $request, $id)
    {
        $signboard = Signboard::findOrFail($id);
        $signboard->approve = 2;  
        $signboard->catatan = $request->catatan;        
        $signboard->save();

        return redirect(route('approval.index'))->with(['success' => 'Pengajuan Telah Direject']);
    }
}
