@extends('layouts.layout')

@section('title')
{{ config('app.name') }} | Data Departemen
@endsection
    
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            
          <div class="col-sm-6">
            <h1 class="m-0">Data Departemen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active">Departemen</li>
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
                    <div class="card-header">
                        <div class="row col-sm-12">                            
                            <!-- <div class="col-sm-6"> -->
                            <a  class="btn btn-success float-right " data-toggle="modal" data-target="#tambahDepartemen">
                                     Tambah Departemen <i class="fa fa-plus"></i>
                                </a>   
                    
                        </div><!-- /.row -->
                        <div class="modal fade" id="tambahDepartemen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                    <h4 class="modal-title" id="myModalLabel"><b>Tambahkan Departemen</b></h4>
                                        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        
                                    </div>
                                    <form action="{{ route('departemen.store') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Nama Departemen</label>
                                                <input type="text" name="nama_departemen" class="form-control" placeholder="Nama Departemen" required>
                                            </div>  
                                            <div class="form-group">
                                                <label for="">Kode Departemen</label>
                                                <input type="text" name="kode_departemen" class="form-control" placeholder="Kode Departemen" required>
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
                                <th class="text-center">NAMA DEPARTEMEN</th>
                                <th class="text-center">KODE DEPARTEMEN</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">ACTION</th>
                            </thead>
                            <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($departemens as $departemen)
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td>{{ $departemen->nama_departemen }}</td>
                                        <td>{{ $departemen->kode_departemen }}</td>
                                        <td class="text-center">
                                            @if($departemen->status == 1 )
                                                <label class="label label-success">Aktif</label>
                                            @else
                                                <label class="label label-danger">Non-Aktif</label>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <!-- tombol action -->
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                data-target="#updateDepartemen{{ $departemen->id }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>

                                            {{-- <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                                data-target="#hapusCabang{{ $departemen->id }}">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>    --}}
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="updateDepartemen{{ $departemen->id }}" role="dialog" aria-labelledby="myModalLabel">
                                        
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                
                                                <div class="modal-header text-center">                                                    
                                                    <h4 class="modal-title" id="myModalLabel">Edit <strong>{{ $departemen->nama_departemen }}</strong> ?</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                
                                                <form action="{{ route('departemen.update', $departemen->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('patch') }}
                                                    <div class="modal-body">
                                                        
                                                        <div class="form-group">
                                                            <label for="">Nama Departemen</label>
                                                            <input type="text" name="nama_departemen" placeholder="Nama Cabang" class="form-control" value="{{ $departemen->nama_departemen }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Kode Departemen</label>
                                                            <input type="text" name="kode_departemen" placeholder="Kode Cabang" class="form-control" value="{{ $departemen->kode_departemen }}" required>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="">Status</label>
                                                            <select name="status" class="form-control" required>
                                                                <option value="1" @if($departemen->status == 1) selected @endif>Aktif</option>
                                                                <option value="2" @if($departemen->status == 2) selected @endif>Non-Aktif</option>
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
                                    {{-- <div class="modal fade" id="hapusCabang{{ $cabang->id }}" role="dialog" aria-labelledby="myModalLabel">

                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                
                                                <div class="modal-header text-center">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Anda yakin ingin menghapus <strong>{{ $cabang->nama_cabang }}</strong> ?</h4>
                                                </div>
                                                
                                                <form action="{{ route('cabang.destroy', $cabang->id) }}" method="post">
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
                                    </div>  --}}
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