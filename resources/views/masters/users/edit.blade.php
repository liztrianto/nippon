@extends('layouts.layout')

@section('title')
{{ config('app.name') }} | Update User
@endsection
    
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
            <div class="card card-danger card-outline">
                    <div class="card-header with-border text-center">
                      <a href="#" class="h3">Update User</a>
                      <a href=""><h3 class="card-title"></h3></a>
                    </div>
                    
                    <div class="card-body col-md-12">
                        <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="col-md-12 row">
                            <div class="col-md-6 row">
                                                                                             
                                <div class="col-sm-4">
                                    <label for="">Nama User</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}"
                                    placeholder="Nama User">
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">NIK</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="nik" id="nik"  value="{{ $user->nik }}"
                                    class="form-control {{ $errors->has('nik') ? 'is-invalid':'' }}"
                                     placeholder="NIK">
                                    <p class="text-danger">{{ $errors->first('nik') }}</p>
                                </div>

                                <!-- <div class="col-sm-4">
                                    <label for="">Username</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="username" id="username"  value="{{ $user->username }}"
                                    class="form-control {{ $errors->has('username') ? 'is-invalid':'' }}"
                                     placeholder="Username">
                                    <p class="text-danger">{{ $errors->first('username') }}</p>
                                </div> -->
                                <div class="col-sm-4">
                                    <label for="">Email</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="email" name="email" id="email"  value="{{ $user->email }}"
                                    class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}"
                                     placeholder="Email">
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Password</label>
                                </div>
                                <div class="col-sm-8">
                                <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" placeholder="Password">
                                    <p class="text-warning">Kosongkan jika tidak ingin mengubah password</p>
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Komfirmasi Password</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="password" name="password_confirmation" id="password_confirmation" 
                                     class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid':'' }}"
                                     placeholder="Komfirmasi Password">
                                    <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                                </div> 
                                <p class="text-danger"></p><p class="text-danger"></p><p class="text-danger"></p>    
                            </div>                         
                                          
                                                             
                            <div class="col-md-6 row">
                            
                                 <div class="col-sm-4">
                                    <label for="">Status</label>
                                </div>
                                <div class="col-sm-8">
                                    <select name="active" class="form-control 
                                    {{ $errors->has('active') ? 'is-invalid':'' }}">
                                    <option value="1" @if($user->active == 1) selected @endif>Aktif</option>                                     
                                        <option value="0" @if($user->active == 0) selected @endif>Tidak Aktif</option>                                   
                                    </select>
                                    <p class="text-danger">{{ $errors->first('active') }}</p>
                                </div>      

                                <div class="col-sm-4">
                                    <label for="">Jabatan</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="jabatan" value="{{ $user->jabatan }}"
                                    class="form-control 
                                    {{ $errors->has('jabatan') ? 'is-invalid':'' }}" placeholder="Jabatan">
                                    <p class="text-danger">{{ $errors->first('jabatan') }}</p>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Atasan</label>
                                </div>
                                <div class="col-sm-8">
                                    <select name="atasan_id" class="form-control {{ $errors->has('atasan_id') ? 'is-invalid':'' }} selectpicker" data-live-search="true">
                                        <option value="" disabled selected>Pilih Atasan</option>
                                        @foreach ($karyawan as $atasan)
                                        <option value="{{ $atasan->id }}" @if($atasan->id == $user->atasan_id) selected @endif>{{ $atasan->name }}</option>
                                        @endforeach                                        
                                    </select>
                                    <p class="text-danger"></p>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Depo</label>
                                </div>
                                <div class="col-sm-8">
                                    <select name="depo_id" class="form-control {{ $errors->has('depo_id') ? 'is-invalid':'' }} selectpicker" data-live-search="true">
                                        <option value="" disabled selected>Pilih Depo</option>
                                        @foreach ($depos as $depo)
                                        <option value="{{ $depo->id }}" @if($depo->id == $user->depo_id) selected @endif>{{ $depo->nama_depo }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger"></p>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Departemen</label>
                                </div>
                                <div class="col-sm-8">
                                <select name="departemen_id" class="form-control {{ $errors->has('departemen_id') ? 'is-invalid':'' }} selectpicker" data-live-search="true">
                                        <option value="" disabled selected>Pilih Departemen</option>
                                        @foreach ($departemens as $departemen)
                                        <option value="{{ $departemen->id }}" @if($departemen->id == $user->dept_id) selected @endif>{{ $departemen->nama_departemen }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger"></p>
                                </div>
                                
                                <div class="col-sm-4">                                      
                                    <label for="">Upload Foto (jpg/png)</label>                                    
                                </div>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="file" accept="image/png, image/jpeg" >
                                    <br>
                                    <img src="{{ asset('images/profile/default-profile.jpg') }}" width="100px" height="100px">
                                </div>
                                                  
                                                                                                                 
                            </div>
                            
                            <div class="col-md-12">
                                <br>
                                <center>
                                <div class="col-sm-5"></div>                                
                                <div class="col-sm-7">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fa fa-send"> </i>  SUBMIT
                                    </button>
                                    <a href="{{ route('users.index') }}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-close"></i>  BATAL
                                    </a>
                                </div>
                                </center>

                            </div>
                           
                        </div>
                        </form>
                    </div>
                </div>  
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection

  <!-- @section('js-extra')
    <script type="text/javascript">
        $("select[name='toko_id']").change(function(){
            var toko = $(this).val();
            var token = $("input[name='_token']").val();            
            
            console.log(toko);
            $.ajax({
                url: "{{ route('signboard.selecttoko')}}",
                method: 'POST',
                // data: {toko:toko},
                data: {toko:toko, _token:token},
                success: function(data) {
                    console.log(data.id);
                    $('#nama_toko').val(" ");
                    $('#nama_toko').val(data.nama_toko);
                    $('#alamat').val(" ");
                    $('#alamat').val(data.alamat);
                    $('#kota').val(" ");
                    $('#kota').val(data.kota);
                    $('#nama_pemilik').val(" ");
                    $('#nama_pemilik').val(data.nama_pemilik);
                    // $('#cabang').val(" ");
                    // $('#cabang').val(data.nama_cabang);              
                 
                    // $('#jenis_id').html(" ");
                    // $('#jenis_id').append(op);               

                }

            });

        });        

    </script>


@endsection -->
