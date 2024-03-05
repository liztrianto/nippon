<?php

namespace App\Http\Controllers\Signboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB; use Auth;
use App\Models\Depo;
use App\Models\User;
use App\Models\Toko;
use DataTables;
use App\Models\Signboard;

class VendorController extends Controller
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
       
        // ->addColumn('action', 'signboard.actionsignboard') //mengambil dari blade view
        // ->editColumn('approve', 'signboard.buttonapproval') //mengambil dari blade view
        ->addColumn('action', 'signboard.approval.button') //mengambil dari blade view
        ->addColumn('approve', 'signboard.approval.modal') //mengambil dari blade view
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
        ->leftJoin('m_departemen as dept','pemohon.dept_id','=','dept.id')
        ->leftJoin('m_depo as depo','toko.depo_id','=','depo.id')
        ->leftJoin('users as pembuat', 'signboards.created_by', '=', 'pembuat.id')
        ->select([
            'signboards.*',  'pembuat.name as pembuat' ,
            'toko.kode_sap as kode_sap','toko.nama_toko as nama_toko','toko.alamat as alamat',
            'toko.kota as kota','toko.nama_pemilik','toko.no_telp',
             'dept.nama_departemen as dept', 'depo.nama_depo', 'depo.id as depo_id', 'depo.manager_id'           
        ])
        ->where([['signboards.approve','!=',0],['signboards.approve','!=',1],['signboards.approve','!=',2]])
        ->get();              
        
        return DataTables::of($signboard)
        ->addIndexColumn()
        // ->editColumn('tanggal_pengajuan', function ($signboard){
        //     return date('d-m-Y', strtotime($signboard->tanggal_pengajuan));
        // })
        ->addColumn('depo', function($signboard){
            if($signboard->depo_id == null){
                return '<i>(kosong)</i>';            }

            return $signboard->nama_depo;
        })
        ->addColumn('action', function($signboard){
            return view('signboard.vendor.action', [
                'model' => $signboard,
                'url_show' => route('vendor.show', $signboard->id),
                'url_edit' => route('vendor.edit', $signboard->id),
                // 'url_destroy' => route('controller.destroy', $signboard->id)
            ]);
        })
        // ->editColumn('action', function ($signboard){          

        //     return '<button type="button" class="detail btn btn-info btn-sm" title="Detail"
        //             id="'.$signboard->id.'" name="detail" 
        //             style="width:80px;margin-top: 5px;">
        //                 <i class="fa fa-eye"></i> Detail
        //             </button>';                    

           
        // })
       
        // ->addColumn('action', 'signboard.controller.button') //mengambil dari blade view
        ->addColumn('approval', 'signboard.controller.modal') //mengambil dari blade view
        ->rawColumns(['approval','action'])
        
        ->escapeColumns([]) //untuk mengaplikasikan html syntax
    ->make(true);

    }

    public function index()
    {
        $user = Auth::user();
        $depos = Depo::OrderBy('nama_depo', 'ASC')->get();
        return view('signboard.vendor.index',  compact('depos'));
    }

    public function show($id)
    {
        // $model = Signboard::findOrFail($id);   
        $model = Signboard::with(['toko','depo'])->where('id', $id)->first();     
        return view('signboard.vendor.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Signboard::findOrFail($id);
        $vendors = User::orderBy('name', 'ASC')->where([['name','!=','Administrator'],['jabatan_id','=',31]])->get();       
        return view('signboard.vendor.form', compact(
            'model','vendors'
        ));
    }
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'vendor_id' => 'required',
            'nomor_po' => 'required'
        ]);

        $signboard = Signboard::findOrFail($id);
        $signboard->approve = 3;  
        $signboard->keterangan = $request->keterangan;        
        $signboard->nomor_po = $request->nomor_po;        
        $signboard->vendor_id = $request->vendor_id;        
        $signboard->save();

        // return redirect()->route('controller.index')->withSuccess('Data berhasil diupdate');
        // return redirect(route('approval.index'))->with(['success' => 'Pengajuan Telah Direject']);
        // return redirect(route('controller.index'))->with(['success' => 'Pengajuan Telah Diajukan']);
    }

    public function showPhoto($id)
    {   
        
        $form = Signboard::findOrFail($id);         
       return  Storage::disk('google')->get('signboard/foto/'.$form->upload_foto); 
    

    }
    public function showFile($id)
    {   
        
        $form = Signboard::findOrFail($id);   
        return Storage::disk('google')->get('signboard/file/'.$form->upload_file); 

    }
}
