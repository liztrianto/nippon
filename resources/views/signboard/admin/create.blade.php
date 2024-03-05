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
                      <a href="#" class="h3">Form Pengajuan SignBoard</a>
                      <a href=""><h3 class="card-title"></h3></a>
                    </div>
                    
                    <div class="card-body col-md-12">
                        <form action="{{ route('signboard.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-12 row">
                            <div class="col-md-6 row">
                                
                                
                                <div class="col-sm-4">
                                    <label for="">Kode SAP</label>
                                </div>
                                <div class="col-sm-8">
                                    <select name="toko_id" id="toko_id" 
                                        class="select2" data-live-search="true" style="width: 100%;" required>
                                    </select> 
                                    <p class="text-danger"></p>                                    
                                </div>
                              
                                <!-- <div class="col-sm-4">
                                    <label for="">Nama Toko</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_toko" id="nama_toko" class="form-control" 
                                    placeholder="Nama Toko" readonly>
                                    <p class="text-danger"></p>
                                </div> -->
                                <div class="col-sm-4">
                                    <label for="">Nama Pemilik Toko</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_pemilik" id="nama_pemilik"  class="form-control"
                                     placeholder="Nama Pemilik Toko" readonly>
                                    <p class="text-danger"></p>
                                </div>    

                
                              <div class="col-sm-4"><label for="">Alamat </label></div>
                                <div class="col-sm-8"><textarea class="form-control" name="alamat" 
                                id="alamat" cols="60" rows="2" required readonly></textarea>
                              <br></div>

                              
                                <div class="col-sm-4">
                                    <label for="">Kota</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="kota" id="kota" class="form-control" 
                                    placeholder="Kota" readonly>
                                    <p class="text-danger"></p>
                                </div>  

                                <div class="col-sm-4">
                                    <label for="">Kepala Depo</label>
                                </div>
                                <div class="col-sm-8">
                                <select name="kadepo_id" id="kadepo_id" 
                                class="form-control select2{{ $errors->has('kadepo_id') ? 'is-invalid':'' }}" data-live-search="true">
                                        <option value="" disabled selected>Pilih Kepala Depo</option>
                                        @foreach ($kadepos as $kadepo)
                                        <option value="{{ $kadepo->id }}">{{ $kadepo->name }}</option>
                                        @endforeach                                        
                                    </select>
                                    <p class="text-danger"></p>
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Nama Sales</label>
                                </div>

                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <!-- <input type="text" name="sales" id="sales" class="form-control" 
                                                placeholder="Nama Sales">  -->
                                                        <select name="sales_id" id="sales_id" class="form-control 
                                            {{ $errors->has('sales_id') ? 'is-invalid':'' }} selectpicker" 
                                            data-live-search="true" required>
                                                                                        
                                            </select>
                                        <div class="input-group-append">
                                        <button type="button" 
                                        class="btn btn-success btn-md" title="Tambah Sales" data-toggle="modal"
                                            data-target="#tambah_sales">
                                        <span class="fa fa-plus"></span></button>
                                        </div>
                                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                         data-target="#exampleModal">
                                            Tambah Data
                                            </button> -->

                                    </div>
                                    
                                    <p class="text-danger"></p>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Omset Update</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="text" name="omset" id="omset" class="form-control input-rupiah"
                                            placeholder="Omset Update" style="text-align: right;" inputmode="numeric" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    <p class="text-danger"></p>
                                </div>  
                                
                                <div class="col-sm-4">
                                    <label for="">Shop Size</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="text" name="shop_size" id="shop_size" class="form-control input-rupiah"
                                            placeholder="Shop Size" style="text-align: right;" inputmode="numeric" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    
                                    <p class="text-danger"></p>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Pajak Reklame</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="text" name="pajak_reklame" id="pajak_reklame" class="form-control input-rupiah"
                                            placeholder="Pajak Reklame" style="text-align: right;" value="0" inputmode="numeric" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    
                                    <p class="text-danger"></p>
                                </div>

                               

                               
                                

                               
                            </div>

                            <div class="col-md-6 row">
                                <div class="col-sm-4">
                                    <label for="">Tanggal Pengajuan</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan" class="form-control"
                                     placeholder="Tanggal Pengajuan" required>
                                    <p class="text-danger"></p>
                                </div>
                                
                               
                                <div class="col-sm-4">
                                    <label for="">Jenis Pengajuan </label>
                                </div>
                                <div class="col-sm-8">
                                    <select id="jenis_pengajuan"  name="jenis_pengajuan"
                                    class="jenis form-control 
                                    selectpicker" data-live-search="true" required>
                                        <option value="" disabled="true" selected>Pilih Jenis Pengajuan</option>
                                        <option value="1">Pemasangan Baru</option>
                                        <option value="2">Perbaikan</option>
                                        <option value="3">Penurunan</option>
                                    </select>
                                    <p class="text-danger"></p> 
                            
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Konsep Branding </label>
                                </div>
                                <div class="col-sm-8">
                                    <select id="konsep_branding"  name="konsep_branding"
                                    class="jenis form-control 
                                    selectpicker" data-live-search="true" required>
                                        <option value="" disabled="true" selected>Pilih Konsep</option>
                                        <option value="1">Premium</option>
                                        <option value="2">Xsmart</option>
                                        <option value="3">Ready Mix</option>
                                        <option value="4">Xsmart Plus</option>
                                    </select>
                                    <p class="text-danger"></p> 
                            
                                </div>

                                
                                <div class="col-sm-4">
                                    <label for="">Pengiriman </label>
                                </div>
                                <div class="col-sm-8">
                                    <select id="pengiriman"  name="pengiriman"
                                    class="jenis form-control 
                                    selectpicker" data-live-search="true" required>
                                        <option value="" disabled="true" selected>Pilih Pengiriman</option>
                                        <option value="1">Depo</option>
                                        <option value="2">Langsung Toko</option>
                                        <option value="3">Expedisi</option>
                                    </select>
                                    <p class="text-danger"></p> 
                            
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Expedisi </label>
                                </div>
                                <div class="col-sm-8">
                                        <div class="input-group">
                                            <select id="expedisi"  name="expedisi"
                                                class="jenis form-control 
                                                selectpicker" data-live-search="true" disabled>
                                                    
                                            </select>
                                            
                                                         
                                        <div class="input-group-append">
                                        <button type="button" 
                                        class="btn btn-success btn-md" title="Tambah Expedisi" data-toggle="modal"
                                            data-target="#tambah_expedisi" id="tambahexpedisi" disabled>
                                        <span class="fa fa-plus"></span></button>
                                        </div>
                                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                         data-target="#exampleModal">
                                            Tambah Data
                                            </button> -->

                                    </div>
                                    
                                    <p class="text-danger"></p> 
                            
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Merk</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="merk" id="merk" class="form-control" 
                                    placeholder="Merk" disabled>
                                    
                                    <p class="text-danger"></p> 
                            
                                </div>

                                <div class="col-sm-4">
                                    <label for="">Upload Form Pengajuan</label>
                                </div>
                                <div class="col-sm-8">
                                        <input type="file" class="form-control" name="upload_file" 
                                        accept="image/png, image/jpeg, application/pdf" required>

                                            <!-- <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label> -->
                                        
                                    <p class="text-danger"></p>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Upload foto titik pasang</label>
                                </div>
                                <div class="col-sm-8">
                                   
                                        <input type="file" class="form-control" name="upload_foto" 
                                        accept="image/png, image/jpeg" required>
                                            <!-- <input type="file" class="custom-file-input" name="upload_foto" accept="image/png, image/jpeg"> -->
                                            <!-- <label class="custom-file-label" for="upload_foto">Choose file</label> -->
                                       
                                    <p class="text-danger"></p>
                                </div>
                                                                                 
                                                                                                                 
                            </div>
                            
                            <div class="com-md-12 row">  
                                <!-- <div class=""></div> -->
                                            <div class="col-sm-1 bg-light-blue" >
                                                <label for=""></label>
                                                <!-- <p class="text-danger"></p> -->
                                            </div> 
                                            <div class="col-sm-4 bg-primary" style="margin-top: 5px; margin-bottom:10px">
                                                <label for="" style="margin-top: 5px;">Design</label>
                                                <!-- <p class="text-danger"></p> -->
                                            </div>
                                            <div class="col-sm-2 bg-blue " style="margin-top: 5px; margin-bottom:10px">
                                                <label for="" style="margin-top: 5px; ">Panjang</label>
                                                <!-- <p class="text-danger"></p> -->
                                            </div> 
                                            <div class="col-sm-2 bg-blue " style="margin-top: 5px; margin-bottom:10px">
                                                <label for="" style="margin-top: 5px; ">Lebar</label>
                                                <!-- <p class="text-danger"></p> -->
                                            </div> 
                                            <div class="col-sm-2 bg-blue " style="margin-top: 5px; margin-bottom:10px">
                                                <label for="" style="margin-top: 5px; ">Sisi</label>
                                                <!-- <p class="text-danger"></p> -->
                                            </div> 
                                            <div class="col-sm-1 bg-light-blue">
                                                <label for=""></label>
                                                <!-- <p class="text-danger"></p> -->
                                            </div>
                                            
                                            
                                            @php 
                                            $i = 0;
                                            $count = 1;
                                        @endphp
                                        @foreach($design as $row)
                                        
                                            <div class="col-sm-1 ">
                                                <div class="icheck-success d-inline float-sm-right" >
                                                    <input type="checkbox" class="design" id="checkbox{{$i}}" value="checkbox{{$i}}"
                                                    @if($row->urutan == 1)    
                                                        disabled
                                                    @endif > 
                                                    <label for="checkbox{{$i}}"  style="margin-top: 10px;">
                                                    </label>
                                                    <input type="text" name="id[]" id="id{{$i}}" value=" {{ $row->id }}" style="display:none;"
                                                      class="form-control"  >
                                                      <input type="text" name="type[]" id="type{{$i}}" value=" {{ $row->type }}" style="display:none;"
                                                      class="form-control"  >
                                                </div>
                                               <!-- <input style="margin-top: 5px;" type="checkbox" name="my-checkbox" id="{{$i}}" data-bootstrap-switch> -->
                                               <p class="text-danger"></p>
                                            </div>
                                            <div class="col-sm-4 bg-light-blue">
                                                    <!-- <label for="checkbox{{$i}}"  style="margin-top: 10px;"> -->
                                                    <input type="text" name="design[]" id="design{{$i}}" class="form-control jenis"
                                                style="margin-top: 5px; " placeholder="Design" value=" {{ $row->design }}" required
                                                @if($row->urutan == 1)
                                                    enabled
                                                @else
                                                    disabled
                                                @endif >
                                                <p class="text-danger"></p>
                                            </div> 
                                            <div class="col-sm-2 bg-light-blue">
                                                    <input type="text" name="panjang[]" id="panjang{{$i}}" class="form-control"
                                                style="margin-top: 5px;  " placeholder="Panjang" inputmode="numeric" 
                                                @if($row->urutan == 1)
                                                    enabled required
                                                @else
                                                    disabled
                                                @endif >
                                                <p class="text-danger"></p>
                                            </div> 
                                            <div class="col-sm-2 bg-light-blue">
                                                    <input type="text" name="lebar[]" id="lebar{{$i}}" class="form-control"
                                                style="margin-top: 5px;" placeholder="Lebar" inputmode="numeric" 
                                                @if($row->urutan == 1)
                                                    enabled required
                                                @else
                                                    disabled
                                                @endif >
                                                <p class="text-danger"></p>
                                            </div> 
                                            <div class="col-sm-2 bg-light-blue">
                                                <div class="form-group" style="margin-top: 5px; ">
                                                        <select name="sisi[]" id="sisi{{$i}}" 
                                                            class="form-control {{ $errors->has('kondisi[]') ? 'is-invalid':'' }}
                                                            selectpicker" 
                                                            @if($row->urutan == 1)
                                                                enabled
                                                            @else
                                                                disabled
                                                            @endif >
                                                                <option value="1" selected>1 Sisi</option>                                       
                                                                <option value="2">2 Sisi</option>                                        
                                                            </select>      
                                                
                                                    <p class="text-danger">{{ $errors->first('kondisi[]') }}</p>
                                                </div>
                    
                                                <!-- <input type="number" name="sisi[]" id="sisi{{$i}}" class="form-control"
                                                style="margin-top: 5px; " placeholder="Sisi" max=2 min=1 value=1 readonly  > -->
                                                <!-- <p class="text-danger"></p> -->
                                            </div> 
                                            <div class="col-sm-1 bg-light-blue">
                                                <!-- @if($count == $jumlahRow)                                                   
                                                    <button type="button" name="barang_more" id="add_button" 
                                                        class="btn btn-success btn-md" style="margin-top: 5px; ">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                    @endif -->
                                                    <!-- <label for="">-</label> -->

                                                <p class="text-danger"></p>
                                            </div>
                                        @php 
                                            $i++;
                                            $count++; 
                                        @endphp
                                        @endforeach
                               

                               
                            </div>
                            
                            <div class="col-md-12">
                                <br>
                                <center>
                                <div class="col-sm-5"></div>                                
                                <div class="col-sm-7">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fa fa-send"> </i>  SUBMIT
                                    </button>
                                    <a href="{{ route('signboard.index') }}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-close"></i>  BATAL
                                    </a>
                                </div>
                                </center>

                            </div>
                           
                        </div>
                        </form>

                        <div class="modal fade" id="tambah_sales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulir untuk memasukkan data -->
                                    <form id="formTambahSales">
                                    <!-- Isi formulir disini -->
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                                <label for="">REG ID</label>
                                                <input type="text" name="nik" id="nik" 
                                                            class="form-control " 
                                                            placeholder="REG ID">
                                            </div>  
                                            <div class="form-group">
                                                <label for="">Nama Sales</label>
                                                <input type="text" name="name" id="name" 
                                                            class="form-control " 
                                                            placeholder="Nama Sales">
                                            </div>  
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-primary" id="simpanSales">Simpan</button>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="tambah_expedisi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Expedisi</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulir untuk memasukkan data -->
                                    <form id="formTambahExpedisi">
                                    <!-- Isi formulir disini -->
                                    {{ csrf_field() }}
                                    
                                        <div class="form-group">
                                            <label for="">Nama Expedisi</label>
                                            <input type="text" name="namaexpedisi" id="namaexpedisi" 
                                                        class="form-control " 
                                                        placeholder="Nama Expedisi" required>
                                        </div>  
                                        <div class="form-group">
                                            <label for="">Alamat Expedisi</label>
                                            <textarea class="form-control" name="alamatexpedisi" 
                                            id="alamatexpedisi" cols="60" rows="2" required ></textarea>
                                        </div>  
                                        <div class="form-group">
                                                <label for="">Kota</label>
                                                <input type="text" name="kotaexpedisi" id="kotaexpedisi" 
                                                            class="form-control " 
                                                            placeholder="Kota" required>
                                            </div>  
                                            <div class="form-group">
                                                <label for="">No Telepon</label>
                                                <input type="text" name="no_telpexpedisi" id="no_telpexpedisi" 
                                                            class="form-control " 
                                                            placeholder="No Telepon" required>
                                            </div>  
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-primary" id="simpanExpedisi">Simpan</button>
                                </div>
                                </div>
                            </div>
                        </div>

                      
                        
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
         $("#kadepo_id").select2({
                placeholder: 'Pilih Kepala Depo ...',
                theme: "bootstrap-5",
            });
        //  $("#sales_id").select2({
        //         placeholder: 'Pilih Sales...',
        //         theme: "bootstrap-5",
        //     });


         $("#toko_id").select2({
                placeholder: 'Pilih Toko',
                theme: "bootstrap-5",
                ajax: {
                    url: "{{ route('signboard.gettoko')}}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            term: params.term || '',
                            page: params.page || 1
                        }
                    },
                    cache: true
                }
            });

            $("#sales_id").select2({
                placeholder: 'Pilih Sales',
                theme: "bootstrap-5",
                ajax: {
                    url: "{{ route('signboard.getsales')}}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            term: params.term || '',
                            page: params.page || 1
                        }
                    },
                    cache: true
                }
            });
            $("#expedisi").select2({
                placeholder: 'Pilih Expedisi',
                theme: "bootstrap-5",
                ajax: {
                    url: "{{ route('signboard.getexpedisi')}}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            term: params.term || '',
                            page: params.page || 1
                        }
                    },
                    cache: true
                }
            });

        function setSalesIdByValue(value,sales_id) {
            $.ajax({
                url: "{{ route('signboard.getsales') }}", // Sesuaikan dengan URL Anda
                dataType: 'json',
                data: {
                    term: value, // nilai pencarian
                    page: 1
                },
                success: function(data) {
                    if (data.results.length > 0) {
                        for (let i = 0; i < data.results.length; i++) {
                            if(data.results[i].id == sales_id){

                                var item = data.results[i]; // Ambil hasil pertama
                            }

                                
                        }
                            var newOption = new Option(item.text, item.id, true, true);
                        // $('#sales_id').val(sales_id).trigger('change');
                        $("#sales_id").append(newOption).trigger('change'); 
                                             
                       
                    }
                }
            });
        }

            

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
                    $('#alamat').val(" ");
                    $('#alamat').val(data.alamat);
                    $('#kota').val(" ");
                    $('#kota').val(data.kota);
                    $('#nama_pemilik').val(" ");
                    $('#nama_pemilik').val(data.nama_pemilik);
                    $('#kadepo_id').val(" ");
                    $('#kadepo_id').val(data.kadepo); 
                    $('#kadepo_id').trigger('change'); 
                    if(data.sales_id != 0){
                        if(data.nik != 0){
                            // $('#sales_id').find(data.sales_id);
                            setSalesIdByValue(data.nik,data.sales_id);
                            // $('#sales_id').val(data.sales_id).trigger('change');
                        }
                        // $('#sales_id').find(data.sales_id);
                        // setSalesIdByValue(data.nik,data.sales_id);
                        // $('#sales_id').val(data.sales_id).trigger('change');
                    } else {
                        $('#sales_id').val("").trigger('change');
                    }            
                    // if(data.sales_id != 0){
                    //     $('#sales_id').val(" ");
                    //     $('#sales_id').val(data.sales_id); 
                    //     $('#sales_id').trigger('change');
                    // }else{
                    //     $('#sales_id').val("");
                    //     $('#sales_id').trigger('change');
                    // }
                                

                }

            });

        });  

        const checkboxes = document.querySelectorAll('.design');
        // const design = document.querySelectorAll('.jenis');

        for (let i = 0; i < checkboxes.length; i++) {
            var count = 1; 
           
            checkboxes[i].addEventListener('click', function() {
                // Ini adalah fungsi yang akan dijalankan ketika checkbox diklik
                // console.log(`Checkbox dengan value ${this.value} telah diklik.`);
                var hasil = $(this).val();
                // toastr.success(hasil);

                if ($(this).is(':checked')) {
                    // design[i].removeAttr('readonly')
                    $("#design"+i).removeAttr('disabled');
                    $("#panjang"+i).removeAttr('disabled');
                    $("#lebar"+i).removeAttr('disabled');
                    $("#sisi"+i).removeAttr('disabled');
                    $("#panjang"+i).attr('required', true); //required input
                    $("#lebar"+i).attr('required', true); //required input

              
                } else {

                    $("#panjang"+i).removeAttr('required');
                    $("#lebar"+i).removeAttr('required');
                    $("#design"+i).attr('disabled', true); //disable input
                    $("#panjang"+i).attr('disabled', true); //disable input
                    $("#lebar"+i).attr('disabled', true); //disable input
                    $("#sisi"+i).attr('disabled', true); //disable input

                    $("#panjang"+i).val("");
                    $("#lebar"+i).val("");
                    $("#sisi"+i).val(1);
                

                    
                }
            });
            count= count + 1;
         }


         $('#pengiriman').change(function(){
            if ( this.value == '3'){
                // $("#cacat").enable();
                document.querySelector('#tambahexpedisi').disabled = false;
                document.querySelector('#merk').disabled = false;
                document.querySelector('#expedisi').disabled = false;
                document.querySelector('#expedisi').required = true;
                document.querySelector('#merk').required = true;
                
            }          
            else {
                document.querySelector('#expedisi').required = false;
                document.querySelector('#merk').required = false;
                document.querySelector('#merk').disabled = true;
                document.querySelector('#expedisi').disabled = true;
                document.querySelector('#tambahexpedisi').disabled = true;
                $('#merk').val("");
                $('#expedisi').val("").trigger('change');
            }
        });

        $('#simpanSales').click(function() {
            var formData = $('#formTambahSales').serialize(); // Ambil data dari formulir modal
            $.ajax({
                url: "{{ route('signboard.addsales') }}", // Ganti 'route.store' dengan nama route penyimpanan Anda
                method: 'POST',
                data: formData,
                success: function(response) {
                // Proses response, misalnya, tutup modal, reset formulir, atau tampilkan pesan sukses
                $('#tambah_sales').modal('hide');
                $('#formTambahSales')[0].reset();
                // alert('Data berhasil disimpan!');
                toastr.success('Data Sales berhasil ditambahkan');
                },
                error: function(xhr, status, error) {
                // Tangani kesalahan jika terjadi
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat menyimpan data.');
                }
            });
        });

        $('#simpanExpedisi').click(function() {
            var formData = $('#formTambahExpedisi').serialize(); // Ambil data dari formulir modal
            $.ajax({
                url: "{{ route('signboard.addexpedisi') }}", // Ganti 'route.store' dengan nama route penyimpanan Anda
                method: 'POST',
                data: formData,
                success: function(response) {
                // Proses response, misalnya, tutup modal, reset formulir, atau tampilkan pesan sukses
                $('#tambah_expedisi').modal('hide');
                $('#formTambahExpedisi')[0].reset();
                // alert('Data berhasil disimpan!');
                toastr.success('Data Expedisi berhasil ditambahkan');
                },
                error: function(xhr, status, error) {
                // Tangani kesalahan jika terjadi
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat menyimpan data.');
                }
            });
        });
     
            
     

    </script>


@endsection
