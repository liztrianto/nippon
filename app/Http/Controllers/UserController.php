<?php

namespace App\Http\Controllers;

use App\Models\Depo;
use App\Models\User;
use App\Models\Departemen;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use DB;
use DataTables;


class UserController extends Controller
{
    public function json()
    {
        $users = DB::table('users')
            ->leftJoin('m_depo', 'm_depo.id', '=', 'users.depo_id')
            ->leftJoin('m_departemen', 'm_departemen.id', '=', 'users.dept_id')
            ->leftJoin('users as atasan', 'atasan.id', '=', 'users.atasan_id')
            ->select([
                'users.id','users.name', 'users.nik','users.email','users.jabatan as jabatan','users.username',
                'users.no_telp','users.depo_id','m_depo.nama_depo','m_depo.kode_depo',
                'users.dept_id','m_departemen.nama_departemen','m_departemen.kode_departemen','users.atasan_id',
                'atasan.name as nama_atasan','users.active','users.image','users.created_at','users.updated_at'
            ])
        ->get(); 
    
        // return response()->json($users);
        return DataTables::of($users)
            ->addIndexColumn()
            // ->editColumn('image', function ($users){
            //     if($users->image == null){
            //         $url=asset("images/profile/default-profile.jpg"); 
            //         return '<img src='.$url.' width="75" height="75" >';
            //     }else{
            //         $url=asset("images/profile/$users->image"); 
            //         return '<img src='.$url.' width="75" height="75" >';
            //     }
            // })
            ->editColumn('nama_depo', function ($users){
                if($users->nama_depo == null){
                    return '<label class="label label-warning">Belum Diset</label>';
                }else{
                    return $users->nama_depo;
                }
            })
            ->editColumn('nama_departemen', function ($users){
                if($users->kode_departemen == null){
                    return '<label class="label label-warning">Belum Diset</label>';
                }else{
                    return $users->nama_departemen;
                }
            })
            ->editColumn('active', function ($users){
                if($users->active == 0){
                    return "<label for='' class='label label-danger'>Non-Aktif</label>";
                }else {
                    return "<label for='' class='label label-success'>Aktif</label>";
                }
            })
            ->addColumn('action', 'masters.users.datatables.action')
            // ->addColumn('kol-role', 'users.datatables.role')
            ->rawColumns(['action'])
            ->escapeColumns([]) //untuk mengaplikasikan html syntax
        ->make(true);
    }
       
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->get();
        $depos = Depo::OrderBy('nama_depo','ASC')->get();
        $departemens = Departemen::orderBy('nama_departemen','ASC')->get();
        return view('masters.users.index', compact('users'));
    }

    public function create()
    {
        // $role = Role::orderBy('name', 'ASC')->get();
        $users = User::orderBy('name', 'ASC')->get();
        $depos = Depo::OrderBy('nama_depo','ASC')->get();
        $departemens = Departemen::orderBy('nama_departemen','ASC')->get();
        return view('masters.users.create', compact('depos','departemens','users'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'jabatan' => 'nullable|string',
            'nik'    => 'required|string|unique:users',
            'depo_id'  => 'nullable|string',
            'dept_id'    => 'nullable|string',
            'atasan_id'  => 'nullable|string'
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->nik      = $request->nik;
        $user->jabatan  = $request->jabatan;
        $user->no_telp  = $request->no_telp;
        $user->depo_id= $request->depo_id;
        $user->dept_id  = $request->departemen_id;
        $user->atasan_id= $request->atasan_id;
        $user->active   = $request->active; 
        
        if($request->file){
            $file = $request->file('file');
            $ekstensi = $file->getClientOriginalExtension();
            $nama_file  = $request->nik.'.'.$ekstensi; 
            $file_resize = Image::make($file->getRealPath());
            $file_resize->resize(215,215);
            $file_resize->save(public_path('images/profile/'.$nama_file));
            $user->image = $nama_file;
        }
        $user->save();
        // $user->assignRole('User');

        return redirect(route('users.index'))->with(['success' => 'User ' . $user->name . ' berhasil ditambahkan']);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $karyawan = User::orderBy('name', 'ASC')->where([['name','!=','Administrator']])->get();
        $depos = Depo::OrderBy('nama_depo','ASC')->get();
        $departemens = Departemen::orderBy('nama_departemen','ASC')->get();
        return view('masters.users.edit', compact('user','karyawan','depos','departemens'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'username' => 'required|string|max:100',
            'nik'    => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($id);
        
        $password = !empty($request->password) ? bcrypt($request->password):$user->password;
        
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->password = $password;
        $user->nik      = $request->nik;
        $user->jabatan  = $request->jabatan;
        $user->no_telp  = $request->no_telp;
        $user->depo_id= $request->depo_id;
        $user->dept_id  = $request->departemen_id;
        $user->atasan_id= $request->atasan_id;
        $user->active   = $request->active;
        
        // $user->update([
        //     'name' => $request->name,
        //     'username' => $request->username,
        //     'email'    => $request->email,
        //     'password' => $password,
        //     'nik'      => $request->nik,
        //     'jabatan'  => $request->jabatan,
        //     'no_telp'  => $request->no_telp,
        //     'depo_id' => $request->depo_id,
        //     'dept_id'  => $request->departemen_id,
        //     'atasan_id' => $request->atasan_id,
        //     'active'   => $request->active
        // ]);


            

        // if($request->file){
        //     if(!empty($user->image)){
        //         File::delete('public/images/profile/'.$user->image);
        //     }

        //     $file = $request->file('file');
        //     $ekstensi = $file->getClientOriginalExtension();
        //     $nama_file  = $request->nik.'.'.$ekstensi; 
        //     $file_resize = Image::make($file->getRealPath());
        //     $file_resize->resize(215,215);
        //     $file_resize->save(public_path('images/profile/'.$nama_file));
            
        //     $user->image = $nama_file;
        // }

        $user->save();
        return redirect(route('users.index'))->with(['success' => 'User ' . $user->name . ' berhasil diupdate']);
    }

    // public function destroy($id)
    // {
    //     $user = User::findOrFail($id);
    //     //hapus foto profil
    //     if(!empty($user->image)){
    //         File::delete('public/images/profile/'.$user->image);
    //     }
    //     //hapus semua role user
    //     for($i = count($user->roles) ; $i > 0 ; $i--){
    //         $user->removeRole($user->roles->first());
    //     }
    //     //hapus semua permisi user
    //     for($i = count($user->permissions) ; $i > 0 ; $i--){
    //         $user->revokePermissionTo($user->permissions->first);
    //     }

    //     $user->delete();
    //     return redirect()->back()->with(['success' => 'User ' . $user->name . ' berhasil dihapus']);
    // }

    // //User-Role
    // public function userRoleList($id)
    // {   
    //     $user   = User::findOrFail($id);
    //     $roles  = Role::orderBy('name', 'ASC')->get();
    //     return view('users.rolelist', compact('user','roles'));
    // }

    // public function userRoleAdd(Request $request, $id)
    // {  
    //     $user = User::findOrFail($id);

    //     for($i = 0 ; $i < count($request->role); $i++){
    //         $user->assignRole($request->role[$i]);
    //     }
    //     return redirect()->back()->with('success', 'Role berhasil ditambahkan');
    // }

    // public function userRoleDelete(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->removeRole($request->role);
    //     return redirect()->back()->with(['success' => 'Role ' . $request->role . ' berhasil dihapus dari '. $user->name ]);
    // }

    // //User-Permission
    // public function userPermissionList($id)
    // {   
    //     $user   = User::findOrFail($id);
    //     $permissions  = Permission::orderBy('name', 'ASC')->get();
    //     return view('users.permissionlist', compact('user','permissions'));
    // }

    // public function userPermissionAdd(Request $request, $id)
    // {  
    //     $user = User::findOrFail($id);

    //     for($i = 0 ; $i < count($request->permission); $i++){
    //         $user->givePermissionTo($request->permission[$i]);
    //     }
    //     return redirect()->back()->with('success', 'Permission berhasil ditambahkan');
    // }

    // public function userPermissionDelete(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->revokePermissionTo($request->permission);
    //     return redirect()->back()->with(['success' => 'Permission ' . $request->permission . ' berhasil dihapus dari '. $user->name ]);
    // }
}
