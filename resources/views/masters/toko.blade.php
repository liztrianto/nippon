@extends('layouts.layout')

@section('title')
{{ config('app.name') }} | Data Toko
@endsection
    
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            
          <div class="col-sm-6">
            <h1 class="m-0">Data Toko</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active">Toko</li>
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
            <div class="col-12">
                <div class="card card-danger card-outline">
                    <div class="card-header row">
                        <!-- <div class="col-md-12">                             -->
                            <!-- <div class="col-sm-6"> -->
                            <div class="col-lg-9 col-6">
                                <h3 class="text-center">List Data Toko</h3>
                            </div>
                            <div class="col-lg-3 col-6 ">
                                <a  class="btn btn-success float-right " data-toggle="modal" data-target="#tambahToko">
                                    <i class="fa fa-plus"></i> Tambah Toko 
                                </a>   
                            </div>
                    
                        <!-- </div> -->
                        <div class="modal fade" id="tambahToko" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                    <h4 class="modal-title" id="myModalLabel"><b>Tambahkan Toko</b></h4>
                                        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        
                                    </div>
                                    <form action="{{ route('toko.store') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal-body">                                           
                                            <div class="form-group">
                                                <label for="">Kode SAP</label>
                                                <input type="text" name="kode_sap" class="form-control" placeholder="Kode SAP" required>
                                            </div> 
                                            <div class="form-group">
                                                <label for="">Nama Toko</label>
                                                <input type="text" name="nama_toko" class="form-control" placeholder="Nama Toko" required>
                                            </div>  
                                            <div class="form-group">
                                                <label for="">Alamat</label>
                                                <textarea class="form-control" name="alamat" 
                                                id="alamat" cols="60" rows="3"></textarea>
                                                <!-- <input type="text" name="alamat" class="form-control" placeholder="Alamat" required> -->
                                            </div>  
                                            <div class="form-group">
                                                <label for="">Kota</label>
                                                <input type="text" name="kota" class="form-control" placeholder="Kota" required>
                                            </div>  
                                            <div class="form-group">
                                                <label for="">Nama Pemilik</label>
                                                <input type="text" name="nama_pemilik" class="form-control" placeholder="Nama Pemilik" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nomor Telepon</label>
                                                <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telepon" required>
                                            </div>     
                                            <div class="form-group">
                                                <label for="">Status</label>
                                                <select name="status" class="form-control" required>
                                                    <option value="1">Aktif</option>
                                                    <option value="2">Non-Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">                                            
                                            <button type="submit" class="btn btn-success">SIMPAN</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">                            
                            <thead>
                                <th class="text-center">#</th>
                                <th class="text-center">KODE SAP</th>
                                <th class="text-center">NAMA TOKO</th>
                                <th class="text-center">ALAMAT</th>
                                <th class="text-center">KOTA</th>
                                <!-- <th class="text-center">NAMA PEMILIK</th> -->
                                <th class="text-center">NO TELEPON</th>
                                <!-- <th class="text-center">DEPO</th> -->
                                <th class="text-center">ACTION</th>
                            </thead>
                            <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($tokos as $toko)
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td>{{ $toko->kode_sap }}</td>
                                        <td>{{ $toko->nama_toko }}</td>
                                        <td>{{ $toko->alamat }}</td>
                                        <td>{{ $toko->kota }}</td>
                                        <!-- <td>{{ $toko->nama_pemilik }}</td> -->
                                        <td>{{ $toko->no_telp }}</td>
                                        <!-- <td>{{ $toko->nama_depo }}</td> -->
                                        <!-- <td class="text-center">
                                            @if($toko->status == 1 )
                                                <label class="label label-success">Aktif</label>
                                            @else
                                                <label class="label label-danger">Non-Aktif</label>
                                            @endif
                                        </td> -->
                                        <td class="text-center">
                                            <!-- tombol action -->
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                data-target="#updateToko{{ $toko->id }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>

                                             <!-- <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                                data-target="#hapusCabang">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>     -->
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="updateToko{{ $toko->id }}" role="dialog" aria-labelledby="myModalLabel">
                                        
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                
                                                <div class="modal-header text-center">                                                    
                                                    <h4 class="modal-title" id="myModalLabel">Edit Toko <strong>{{ $toko->nama_toko }}</strong> ?</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                
                                                <form action="{{ route('toko.update', $toko->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('patch') }}
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Kode SAP</label>
                                                            <input type="text" name="kode_sap" placeholder="Kode SAP" class="form-control" value="{{ $toko->kode_sap }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Nama Toko</label>
                                                            <input type="text" name="nama_toko" placeholder="Nama Cabang" class="form-control" value="{{ $toko->nama_toko }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Alamat</label>
                                                            <textarea class="form-control" name="alamat" 
                                                            id="alamat" cols="60" rows="3">{{ $toko->alamat }}</textarea>
                                                            <!-- <input type="text" name="alamat" class="form-control" placeholder="Alamat" required> -->
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Kota</label>
                                                            <input type="text" name="kota" placeholder="Kota" class="form-control" value="{{ $toko->kota }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Nama Pemilik</label>
                                                            <input type="text" name="nama_pemilik" placeholder="Nama Pemilik" class="form-control" value="{{ $toko->nama_pemilik }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Nomor Telepon</label>
                                                            <input type="text" name="no_telp" placeholder="Nomor Telepon" class="form-control" value="{{ $toko->no_telp }}" required>
                                                        </div>  
                                                       
                                                        
                                                        <div class="form-group">
                                                            <label for="">Status</label>
                                                            <select name="status" class="form-control" required>
                                                                <option value="1" @if($toko->status == 1) selected @endif>Aktif</option>
                                                                <option value="2" @if($toko->status == 2) selected @endif>Non-Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">UPDATE</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                                                    </div>
                                                </form>
                                            
                                            </div>
                                        </div>
                                    </div>  
                                    <!-- modal hapus -->
                                    <div class="modal fade" id="hapusCabang" role="dialog" aria-labelledby="myModalLabel">

                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                
                                                <div class="modal-header text-center">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Anda yakin ingin menghapus <strong></strong> ?</h4>
                                                </div>
                                                
                                                <form action="" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <div class="modal-footer">
                                                        <center>
                                                            <button type="submit" class="btn btn-primary">HAPUS</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                                                            
                                                        </center>
                                                    </div>
                                                </form> 
                                                    
                                            </div>                                         
                                        </div>
                                    </div> 
                                    @endforeach
                                </tbody>
                        
                        
                        </table>
                    </div>
                    <!-- /.card-body -->
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection