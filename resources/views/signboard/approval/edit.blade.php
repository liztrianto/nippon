@extends('layouts.layout')

@section('title')
{{ config('app.name') }} | Sign Board
@endsection
    
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pengajuan SignBoard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pengajuan</a></li>
              <li class="breadcrumb-item active">SignBoard</li>
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
                      <a href="../../index2.html" class="h3">Edit Form Pengajuan SignBoard</a>
                      <a href=""><h3 class="card-title"></h3></a>
                    </div>
                    
                    <div class="card-body col-md-12">
                        <form action="" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-12 row">
                            <div class="col-md-6 row">
                                
                                <div class="col-sm-4">
                                    <label for="">Kode SAP</label>
                                </div>
                                <div class="col-sm-8">
                                    <select name="toko_id" id="toko_id" 
                                        class="form-control 
                                        selectpicker" data-live-search="true" >
                                        <option value="" disabled selected>Pilih Kode SAP Toko</option>
                                        @foreach ($tokos   as $toko)
                                        <option value="{{ $toko->id }}">{{ $toko->kode_sap }}</option>
                                        @endforeach
                                    </select>  
                                    <!-- <select name="pemohon_id" id="pemohon_id" 
                                    class="form-control
                                     selectpicker" data-live-search="true" 
                                     onchange="showPemohon(this.value)" required>
                                        <option value="" disabled selected>Pilih </option>
                                        
                                    </select>                                     -->
                                    <p class="text-danger"></p>
                                    
                                </div>
                              
                                <div class="col-sm-4">
                                    <label for="">Nama Toko</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_toko" id="nama_toko" class="form-control" 
                                    placeholder="Nama Toko">
                                    <p class="text-danger"></p>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Nama Pemilik Toko</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_pemilik" id="nama_pemilik"  class="form-control"
                                     placeholder="Nama Pemilik Toko">
                                    <p class="text-danger"></p>
                                </div>    

                
                              <div class="col-sm-4"><label for="">Alamat </label></div>
                                <div class="col-sm-8"><textarea class="form-control" name="alamat" 
                                id="alamat" cols="60" rows="3" required></textarea>
                              <br></div>

                              
                                <div class="col-sm-4">
                                    <label for="">Kota</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="kota" id="kota" class="form-control" 
                                    placeholder="Kota">
                                    <p class="text-danger"></p>
                                </div>  

                                <div class="col-sm-4">
                                    <label for="">Omset Update</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="omset" id="omset" 
                                    class="form-control " 
                                    placeholder="Omset Update">
                                    <p class="text-danger"></p>
                                </div>   
                                          
                             
                                <div class="col-sm-4">
                                    <label for="">Nama Sales</label>
                                </div>
                                <div class="col-sm-8">
                                    <select name="atasan_id" class="form-control {{ $errors->has('atasan_id') ? 'is-invalid':'' }} selectpicker" data-live-search="true">
                                        <option value="" disabled selected>Pilih Sales</option>
                                        @foreach ($sales as $sale)
                                        <option value="{{ $sale->id }}">{{ $sale->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                    <p class="text-danger"></p>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Kepala Depo</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="cabang" id="cabang" class="form-control"
                                     placeholder="Kepala Depo">
                                    <p class="text-danger"></p>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Shop Size</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="cabang" id="cabang" class="form-control"
                                     placeholder="Shop Size">
                                    <p class="text-danger"></p>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Pajak Reklame</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="cabang" id="cabang" class="form-control"
                                     placeholder="Pajak Reklame">
                                    <p class="text-danger"></p>
                                </div>
                            </div>

                            <div class="col-md-6 row">
                                <div class="col-sm-4">
                                    <label for="">Tanggal Pengajuan</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="date" name="cabang" id="cabang" class="form-control"
                                     placeholder="Tanggal Pengajuan">
                                    <p class="text-danger"></p>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Jenis Pengajuan </label>
                                </div>
                                <div class="col-sm-8">
                                    <select id="jenis"  name="jenis"
                                    class="jenis form-control 
                                    selectpicker" data-live-search="true" required>
                                        <option value="" disabled="true" selected>Pilih Jenis Pengajuan</option>
                                        <option value="Hardware">Pemasangan Baru</option>
                                        <option value="Software">Perbaikan</option>
                                        <option value="Consumables">Penurunan</option>
                                    </select>
                                    <p class="text-danger"></p> 
                            
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Konsep Branding </label>
                                </div>
                                <div class="col-sm-8">
                                    <select id="jenis"  name="jenis"
                                    class="jenis form-control 
                                    selectpicker" data-live-search="true" required>
                                        <option value="" disabled="true" selected>Pilih Konsep</option>
                                        <option value="Hardware">Premium</option>
                                        <option value="Software">Xsmart</option>
                                        <option value="Consumables">Ready Mix</option>
                                        <option value="Software">Xsmart Plus</option>
                                    </select>
                                    <p class="text-danger"></p> 
                            
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Design </label>
                                </div>
                                <div class="col-sm-8">
                                    <select id="jenis"  name="jenis"
                                    class="jenis form-control 
                                    selectpicker" data-live-search="true" required>
                                        <option value="" disabled="true" selected>Pilih Design</option>
                                        <!-- <option value="Hardware">Pemasangan Baru</option>
                                        <option value="Software">Perbaikan</option>
                                        <option value="Consumables">Penurunan</option> -->
                                    </select>
                                    <p class="text-danger"></p>                             
                                </div>
                                
                                <div class="col-sm-4">
                                    <label for="">Sisi</label>
                                </div>
                                <div class="col-sm-8">
                                    <select id="jenis"  name="jenis"
                                    class="jenis form-control 
                                    selectpicker" data-live-search="true" required>
                                        <option value="" disabled="true" selected>Pilih Sisi</option>
                                        <!-- <option value="Hardware">Pemasangan Baru</option>
                                        <option value="Software">Perbaikan</option>
                                        <option value="Consumables">Penurunan</option> -->
                                    </select>
                                    <p class="text-danger"></p>                             
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Ukuran Panjang</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="cabang" id="cabang" class="form-control"
                                     placeholder="Ukuran Panjang">
                                    <p class="text-danger"></p>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Ukuran Lebar</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="cabang" id="cabang" class="form-control"
                                     placeholder="Ukuran Lebar">
                                    <p class="text-danger"></p>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Upload Form Pengajuan</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <p class="text-danger"></p>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Upload foto titik pasang</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <p class="text-danger"></p>
                                </div>


                                <div class="col-sm-4"><label for="">Pengiriman </label></div>
                                <div class="col-sm-8"><textarea class="form-control" name="deskripsi" 
                                id="deskripsi" cols="60" rows="3" required></textarea>
                              <br></div>
                                                  
                                                                                                                 
                            </div>
                            
                            
                            
                            
                            
                            
                            <div class="col-md-12">
                                <br>
                                <center>
                                <div class="col-sm-5"></div>                                
                                <div class="col-sm-7">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fa fa-send"> SUBMIT</i>  
                                    </button>
                                    <a href="" class="btn btn-danger btn-sm">
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

  @section('js-extra')
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


@endsection
