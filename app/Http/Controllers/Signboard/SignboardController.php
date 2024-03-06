<?php

namespace App\Http\Controllers\Signboard;

use DB; 
use DataTables;
use App\Models\Toko;
use App\Models\Sales;
use App\Models\Expedisi;
use App\Models\User;
use App\Models\Signboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Depo;
use App\Models\DesignSignboard;
use App\Models\DetailSignboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yaza\LaravelGoogleDriveStorage\Gdrive;
use File;

// use Yajra\DataTables\DataTables;

class SignboardController extends Controller
{
    public function json()
    {   
        $login = Auth::user();
        // if($login->hasPermissionTo('signboards-all')){
            $signboard = DB::table('signboards')->orderBy('approve', 'DESC')
            ->leftJoin('m_toko as toko', 'signboards.toko_id', '=', 'toko.id')
            ->leftJoin('users as pemohon', 'signboards.pemohon_id', '=', 'pemohon.id')
            // ->leftJoin('users as officer', 'signboards.officer_id', '=', 'officer.id')
            ->leftJoin('m_departemen as dept','pemohon.dept_id','=','dept.id')
            ->leftJoin('m_depo as depo','toko.depo_id','=','depo.id')
            ->leftJoin('users as pembuat', 'signboards.created_by', '=', 'pembuat.id')
            // ->leftJoin('detail_signboard as detail', 'signboards.id', '=', 'detail.signboard_id')
            ->select([
                'signboards.*',
                // 'detail.panjang as detail_panjang','detail.design as detail_design',
                'toko.kode_sap as kode_sap','toko.nama_toko as nama_toko','toko.alamat as alamat',
                'toko.kota as kota',
                'toko.nama_pemilik','toko.no_telp',
                'dept.nama_departemen as dept', 'depo.nama_depo', 
                'depo.id as depo_id', 'depo.manager_id',
                'pembuat.name as pembuat' 
                    ])->where('signboards.created_by','=',$login->id)->get();

            $details = DB::table('detail_signboard')->orderBy('signboard_id', 'DESC')
            ->leftJoin('signboards', 'detail_signboard.signboard_id', '=', 'signboards.id')
            ->select([
                'detail_signboard.*'               
                    ])->where('signboards.created_by','=',$login->id);

          
        
        
        
        return DataTables::of($signboard)
            ->addIndexColumn()
            // ->addColumn('action', function($signboard){
            //     return view('signboard.approval.action', [
            //         'model' => $signboard,
            //         'url_show' => route('approval.show', $signboard->id),
            //         'url_edit' => route('approval.edit', $signboard->id),
            //         // 'url_destroy' => route('controller.destroy', $signboard->id)
            //     ]);
            // })
            // ->editColumn('created_at', function ($signboard){
            //     return date('d-m-Y', strtotime($signboard->created_at));
            // })
            // ->editColumn('tanggal_pengajuan', function ($signboard){
            //     return date('d-M-Y', strtotime($signboard->tanggal_pengajuan));
            // })
            
            // ->editColumn('approve', function ($signboard){
            //     // $login = Auth::user(); 
            //     // if($login->dept_id == 1){
                    
            //         if($signboard->approve == 0)                     
            //             {return '<a data-target="#'.$signboard->id.
            //             '" data-toggle="modal" href=#'.$signboard->id.
            //             '" class="btn btn-info btn-sm"> Menunggu Approval </a>';}                    
            //         else if($signboard->approve == 1)                     
            //         {return '<a data-target="#'.$signboard->id.
            //         '" data-toggle="modal" href=#'.$signboard->id.
            //         '" class="btn btn-success btn-sm"> Approved </a>';}                    
            //         else if($signboard->approve == 2)
            //         {return '<a data-target="#'.$signboard->id.
            //             '" data-toggle="modal" href=#'.$signboard->id.
            //             '" class="lbtn btn-danger btn-sm">Rejected</a>';} 
            //             else 
            //         {return '<a data-target="#'.$signboard->id.
            //             '" data-toggle="modal" href=#'.$signboard->id.
            //             '" class="lbtn btn-danger btn-sm">Pengajuan Vendor</a>';}                      

               
            // })
            // ->addColumn('action', 'signboard.actionsignboard') //mengambil dari blade view
            ->addColumn('button', 'signboard.admin.button') //mengambil dari blade view
            ->addColumn('status', 'signboard.admin.status') //mengambil dari blade view
            ->addColumn('modal', 'signboard.admin.modal') //mengambil dari blade view
            // ->rawColumns(['action'])
            ->rawColumns(['modal','button','status','detail'])
            ->escapeColumns([]) //untuk mengaplikasikan html syntax
            ->make(true);
            // return response()->json($toko);
        }

    public function index()
    {
        return view('signboard.admin.index');
    }
    
    public function create()
    {
        $tokos = Toko::orderBy('kode_sap','ASC')->get();
        $sales = Sales::orderBy('name', 'ASC')->where('active','=','1')->get();
        $kadepos = User::orderBy('name', 'ASC')->where([['name','!=','Admin'],['jabatan_id','=',27]])->get();
        $design = DesignSignboard::orderBy('urutan','ASC')->get();
        $jumlahRow = $design->count();
        return view('signboard.admin.create',compact('tokos','sales','kadepos','design','jumlahRow'));
    }
    
    public function store(Request $request)
    {

        // $this->validate($request, [
        //     'toko_id' => 'required|int',
        //     'sales_id' =>'required|int',
        //     'kadepo_id' =>'required|int',
        //     'deskripsi' => 'required|string',
        //     'akibat' => 'required|string',            
        // ]);

        $login = Auth::user();

        $depo = Depo::orderBy('kode_depo','ASC')
             ->where('id','=',$login->depo_id)->first();
        $kodedepo = $depo->kode_depo;

        $nomorterakhir = Signboard::Orderby('created_at','DESC')->where('depoid','=',$login->depo_id)->first();
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $signboard = new Signboard;

        if($nomorterakhir == null){
            $hasil = "1";

        }else{
            $nomor = $nomorterakhir->no_document;
            $pisah = explode('/',$nomor);

            if((int)$pisah[3] > 0 && $pisah[1] != date('Y')){
                $hasil='1';
            }else{
                $hasil=(int)$pisah[3]+1;

            }
        }

        $datano = sprintf("%04s" , $hasil);
        $nomordocument = "SB-".$kodedepo."/".date('Y')."/".$bulanRomawi[date('n')]."/".$datano;
        $namafile = "SB-".$kodedepo."-".date('Y')."-".$bulanRomawi[date('n')]."-".$datano;
        
        $signboard->no_document = $nomordocument;
        $signboard->toko_id = $request->toko_id;
        $signboard->omset    = $request->omset;
        $signboard->sales_id    = $request->sales_id;
        // $signboard->sales    = $request->sales;
        $signboard->depoid    = $login->depo_id;
        $signboard->kadepo_id    = $request->kadepo_id;
        $signboard->shop_size    = $request->shop_size;
        $signboard->pajak_reklame    = $request->pajak_reklame;
        $signboard->tanggal_pengajuan    = $request->tanggal_pengajuan;
        $signboard->jenis_pengajuan    = $request->jenis_pengajuan;
        $signboard->konsep_branding    = $request->konsep_branding;
        // $signboard->design    = $request->design;
        // $signboard->sisi    = $request->sisi;
        $signboard->pengiriman = $request->pengiriman;
        $signboard->expedisi_id    = $request->expedisi;
        $signboard->merk    = $request->merk;
        $signboard->created_by = $login->id;
        $signboard->approve = 0;

        if($request->panjang != null){

            $signboard->save();
            $i = 0;
         
        foreach($request->panjang as $row){
            $detail = new DetailSignboard();
            $detail->signboard_id = $signboard->id;
            $detail->design_id = $request->id[$i];
            $detail->type = $request->type[$i];
            $detail->design = $request->design[$i];
            $detail->panjang = $request->panjang[$i];
            $detail->lebar = $request->lebar[$i];
            $detail->sisi = $request->sisi[$i];
            // $detail->kondisi = $request->kondisi[$i];
            // $detail->keterangan = $request->keterangan[$i];
            $detail->save();
            $i++;
        }  
        }
        
    
        
        if($request->upload_foto){
            $file = $request->file('upload_foto');
            $ekstensi = $file->getClientOriginalExtension();
            $nama_file  = $namafile.'.'.$ekstensi; 
            // Storage::disk('google')->put('signboard/foto/'.$nama_file, $request->file('upload_foto'));  
            Storage::disk('google')->put('signboard/foto/'.$nama_file, File::get($file));  
            // Storage::putFileAs(
            //     'public/signboard/foto/', //direktori
            //     $request->file('upload_foto'), //file
            //     $nama_file
            //     // time().'_'.$request->file('upload_file')->getClientOriginalName()//nama file berupa time_nama-dokumen-asli
            // );

            // Gdrive::put('signboard/foto/'.$nama_file, $request->file('upload_foto'));
            // $file_resize = Image::make($file->getRealPath());
            // $file_resize->resize(215,215);
            // $file_resize->save(public_path('images/profile/'.$nama_file));
            $signboard->upload_foto = $nama_file;
        }
        if($request->upload_file){
            $file = $request->file('upload_file');
            $ekstensi = $file->getClientOriginalExtension();
            $nama_file  = $namafile.'.'.$ekstensi; 
            Storage::disk('google')->put('signboard/file/'.$nama_file, File::get($file));  
            // Storage::putFileAs(
            //     'public/signboard/file/', //direktori
            //     $request->file('upload_file'), //file
            //     $nama_file
            //     // time().'_'.$request->file('upload_file')->getClientOriginalName()//nama file berupa time_nama-dokumen-asli
            // );
            // Gdrive::put('signboard/file/'.$nama_file, $request->file('upload_file'));
            // $file_resize = Image::make($file->getRealPath());
            // $file_resize->resize(215,215);
            // $file_resize->save(public_path('images/profile/'.$nama_file));
            $signboard->upload_file = $nama_file;
        }
        

       
        // $idterakhir = Pengadaan::Orderby('created_at','DESC')->first();
        // $perbaikan->pengadaan_id = $idterakhir->id;
        $signboard->save();


       
        return redirect(route('signboard.index'))->with(['success' => 'Data Pengajuan berhasil ditambahkan']);
    

    }

    public function getToko(Request $request)
    {        
        
        if ($request->ajax()) {
            $login = Auth::user();
            $term = trim($request->term);

            $models = DB::table('m_toko')->select('id', DB::raw("CONCAT(nama_toko, ' - ', kode_sap) as text"))
            ->where([['kode_sap', 'LIKE',  '%'.$term.'%'],['depo_id','=',$login->depo_id]])
            ->orWhere([['nama_toko', 'LIKE',  '%'.$term.'%'],['depo_id','=',$login->depo_id]])          
            ->orderBy('kode_sap', 'ASC')->simplePaginate(10);            
           
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

    public function getExpedisi(Request $request)
    {        
        
        if ($request->ajax()) {
            $login = Auth::user();
            $term = trim($request->term);

            $models = DB::table('sb_expedisi')->select('id', 'name as text')
            ->where([['name', 'LIKE',  '%'.$term.'%'],['depo_id','=',$login->depo_id]])
            // ->orWhere([['nik', 'LIKE',  '%'.$term.'%'],['depo_id','=',$login->depo_id]])          
            ->orderBy('name', 'ASC')->simplePaginate(10);            
            
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

    public function getSales(Request $request)
    {        
        
        if ($request->ajax()) {
            $login = Auth::user();
            $term = trim($request->term);

            $models = DB::table('sales')->select('id', DB::raw("CONCAT(name, ' - ', nik) as text"))
            ->where([['name', 'LIKE',  '%'.$term.'%'],['depo_id','=',$login->depo_id]])
            ->orWhere([['nik', 'LIKE',  '%'.$term.'%'],['depo_id','=',$login->depo_id]])          
            ->orderBy('name', 'ASC')->simplePaginate(10);            
           
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

    public function selectToko(Request $request)
    {                
        if($request->ajax()){
            $toko = DB::table('m_toko')
            ->leftJoin('m_depo as depo','m_toko.depo_id','=','depo.id')
            ->leftJoin('sales','m_toko.sales_id','=','sales.id')
            ->select([
                    'm_toko.*','depo.kadepo_id as kadepo',
                    'sales.nik'
                ])->where('m_toko.id',$request->toko)->first();
    		
            // $pemohon = User::select('spesifikasi','id')->where('kode',$request
            // ->jenis)->take(100)->get();
    		
    		return response()->json($toko);
    	}
        
    }
    public function simpanSales(Request $request)
    {
        $login = Auth::user();
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'nik'    => 'required|string|unique:sales'
        ]);

        $sales = new Sales;

        $sales->name = $request->name;
        $sales->nik      = $request->nik;
        $sales->depo_id= $login->depo_id;
        
       
        $sales->save();
        // $user->assignRole('User');
        // return redirect(route('approval.index'))->with(['success' => 'Pengajuan Telah Direject']);
        // return response()->json($sales);
        // return response()->json(['message' => 'Data berhasil disimpan.']);
        // return redirect(route('signboard.create'))->with(['success' => 'Sales ' . $sales->name . ' berhasil ditambahkan']);
    }

    public function simpanExpedisi(Request $request)
    {
        $login = Auth::user();
        $this->validate($request, [
            'namaexpedisi' => 'required|string|max:100',
            'alamatexpedisi' => 'required|string|max:100',
            'kotaexpedisi' => 'required|string|max:100',
            'no_telpexpedisi' => 'required|string|max:100'
        ]);

        $data = new Expedisi;

        $data->name = $request->namaexpedisi;
        $data->alamat      = $request->alamatexpedisi;
        $data->kota      = $request->kotaexpedisi;
        $data->no_telp      = $request->no_telpexpedisi;
        $data->depo_id= $login->depo_id;
        
       
        $data->save();
        // $user->assignRole('User');
        // return redirect(route('approval.index'))->with(['success' => 'Pengajuan Telah Direject']);
        // return response()->json($sales);
        // return response()->json(['message' => 'Data berhasil disimpan.']);
        // return redirect(route('signboard.create'))->with(['success' => 'Sales ' . $sales->name . ' berhasil ditambahkan']);
    }


    public function show($id)
    {   
        
        $form = Signboard::findOrFail($id);       
        // return Storage::response("public/FormCuti/".$form->upload_file);   
        
        $data =  Gdrive::get("signboard/file/".$form->upload_file);
        // $data =  Gdrive::get("signboard/file/SB-SBY-2023-XII-0005.pdf");
        // $data = Gdrive::get('path/filename.png');

        return response($data->file, 200)
            ->header('Content-Type', $data->ext);    

    }
    


       
    // public function edit($id)
    // {
    //     $perbaikan = DB::table('perbaikan')
    //             ->leftJoin('jenis_permintaan as jenis', 
    //             'perbaikan.jenis_id', '=', 'jenis.id')
    //             ->select([
    //                 'perbaikan.id','jenis.kode', 'perbaikan.pemohon_id',
    //                 'perbaikan.jenis_id','perbaikan.deskripsi','perbaikan.akibat'
    //             ])
                
    //             ->where('perbaikan.id',$id)->first();
    //     // $perbaikan = Perbaikan::find($id);
    //     $jenis = Jenis_Permintaan::orderBy('kode','ASC')
    //     ->where('status','=','1')->orwhere('kode','=',$perbaikan->kode)->get();
    //     $pemohons = User::orderBy('name', 'ASC')
    //     ->where([['name','!=','Admin'],['active','=','4']])->get();
    //     return view('permintaan.editperbaikan', compact('perbaikan','pemohons','jenis'));
    // }

    // public function updatestatus(Request $request, $id)
    // {
    //     $perbaikan = Perbaikan::findOrFail($id);
        
    //     $perbaikan->status = $request->status;
    //     if($perbaikan->pengadaan_id != null){
    //         $pengadaan = Pengadaan::findOrFail($perbaikan->pengadaan_id);
    //         $pengadaan->status = $request->status;
    //         $pengadaan->save();
    //     }
    //     $perbaikan->save();

    //     return redirect()->back()->with('success', 'Status Perbaikan'.$perbaikan->no_document.' berhasil diupdate');
    // }

    // public function update(Request $request,$id)
    // {

    //     $this->validate($request, [
    //         'pemohon_id' => 'required|int',
    //         'jenis_id' =>'required|int',
    //         'deskripsi' => 'required|string',
    //         'akibat' => 'required|string',
            
    //     ]);
    //     $login = Auth::user();
    //     $perbaikan = Perbaikan::findOrFail($id);
    //     $perbaikan->pemohon_id = $request->pemohon_id;
    //     $perbaikan->jenis_id    = $request->jenis_id;
    //     $perbaikan->deskripsi = $request->deskripsi;
    //     $perbaikan->akibat  = $request->akibat;
    //     $perbaikan->updated_by = $login->id;

    //     if($perbaikan->pengadaan_id != null){
    //         $jenispengajuan = Jenis_Permintaan::find($request->jenis_id);
    //         $pemohon = User::find($request->pemohon_id);

    //         $pengadaan = Pengadaan::findOrFail($perbaikan->pengadaan_id);
    //         $pengadaan->pemohon_id = $request->pemohon_id;
    //         $pengadaan->jenis_id    = $request->jenis_id;
    //         $pengadaan->deskripsi = $request->deskripsi;
    //         $pengadaan->akibat  = $request->akibat;
    //         $pengadaan->updated_by = $login->id;        
    //         $pengadaan->save();
    //     }
                
    //     $perbaikan->save();
        
    //     return redirect(route('perbaikan.index'))
    //     ->with(['success' => 'Data Perbaikan ' . $perbaikan->no_document . ' berhasil diupdate']);
    // }

    // public function destroy($id)
    // {
    //     $perbaikan = Perbaikan::findOrFail($id);
    //     if($perbaikan->pengadaan_id != null){
    //     $pengadaan = Pengadaan::findOrFail($perbaikan->pengadaan_id);
    //     $pengadaan->delete();
    //     }
    //     $perbaikan->delete();
        
    //     return redirect()->back()->withSuccess($perbaikan->no_document.' Berhasil dihapus');
    // }

   
    // public function cetakPerbaikan($id)
    // {
    //     $perbaikan = Perbaikan::find($id);
    //     $pengadaan = Pengadaan::find($perbaikan->pengadaan_id);
    //     $jenis = Jenis_Permintaan::orderBy('kode', 'ASC')
    //     ->where(['id' => $perbaikan->jenis_id ])->get();
    //     $users = User::orderBy('created_at', 'DESC')->where(['id' => $perbaikan->pemohon_id ])->get();
    //     $pembuats = User::orderBy('created_at', 'DESC')->where(['id' => $perbaikan->created_by ])->get();
    //     $pdf = PDF::loadView('permintaan.cetakperbaikan', compact('perbaikan','pengadaan', 'users' , 'jenis','pembuats'));

    //     return $pdf->stream($perbaikan->no_document.'.pdf');
    // }

}
