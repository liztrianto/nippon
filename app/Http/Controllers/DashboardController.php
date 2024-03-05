<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;use Auth;
// use App\Models\Signboard;
    // use App\User; 

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $auth = Auth::user();

        $jumlah_approve = DB::table('signboards')
            ->leftJoin('m_depo as depo','signboards.depoid','=','depo.id')
            ->leftJoin('model_has_depos as relasi', 'depo.id', '=', 'relasi.depo_id')
            ->leftJoin('users as model', 'relasi.model_id', '=', 'model.id')
            ->select([
                'signboards.*'
            ])
            ->where('model.id','=',$auth->id)
            ->where('signboards.approve','=',0)
            ->count();
            // ->get();
        // $jumlah_approve = count($signboard);
    
        $jumlah_control = DB::table('signboards')
            ->leftJoin('m_depo as depo','signboards.depoid','=','depo.id')
            ->leftJoin('model_has_depos as relasi', 'depo.id', '=', 'relasi.depo_id')
            ->leftJoin('users as model', 'relasi.model_id', '=', 'model.id')
            ->select([
                'signboards.*'
            ])
            ->where('model.id','=',$auth->id)
            ->where('signboards.approve','=',1)
            ->count();
            // ->get();
        // $jumlah_control = count($control);
        // $jumlah_arsip = count(Arsip::all());

        return view('dashboard', compact('jumlah_approve','jumlah_control'));
    }

    // public function downloadpanduanregister()   {
            
    //     return Storage::download("public/TUTORIAL REGISTRASI USER.pdf");
    // }

    // public function downloadpanduanapprove()   {
            
    //     return Storage::download("public/TUTORIAL APPROVE USER.pdf");
    // }
}
