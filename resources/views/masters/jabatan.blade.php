@extends('layouts.layout')

@section('title')
{{ config('app.name') }} | Data Jabatan
@endsection
    
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            
          <div class="col-sm-6">
            <h1 class="m-0">Data Jabatan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active">Jabatan</li>
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
                            <a  class="btn btn-success float-right " data-toggle="modal" data-target="#tambahJabatan">
                                     Tambah Jabatan <i class="fa fa-plus"></i>
                                </a>   
                    
                        </div><!-- /.row -->
                        <div class="modal fade" id="tambahJabatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                    <h4 class="modal-title" id="myModalLabel"><b>Tambahkan Jabatan</b></h4>
                                        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        
                                    </div>
                                    <form action="{{ route('jabatan.store') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Nama Departemen</label>
                                                <select name="dept_id" id="dept_id" class="form-control select2" 
                                                    style="font-size:12px;">                                    
                                                </select>
                                            </div>  
                                            <div class="form-group">
                                                <label for="">Jabatan</label>
                                                <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" required>
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
                                <th class="text-center">JABATAN</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">ACTION</th>
                            </thead>
                            <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($jabatans as $jabatan)
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td>{{ $jabatan->nama_departemen }}</td>
                                        <td>{{ $jabatan->jabatan }}</td>
                                        <td class="text-center">
                                            @if($jabatan->status == 1 )
                                                <label class="label label-success">Aktif</label>
                                            @else
                                                <label class="label label-danger">Non-Aktif</label>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <!-- tombol action -->
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                data-target="#updateJabatan{{ $jabatan->id }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>

                                            {{-- <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                                data-target="#hapusCabang{{ $jabatan->id }}">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>    --}}
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="updateJabatan{{ $jabatan->id }}" role="dialog" aria-labelledby="myModalLabel">
                                        
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                
                                                <div class="modal-header text-center">                                                    
                                                    <h4 class="modal-title" id="myModalLabel">Edit <strong>{{ $jabatan->nama_departemen }}</strong> ?</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                
                                                <form action="{{ route('jabatan.update', $jabatan->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('patch') }}
                                                    <div class="modal-body">
                                                        
                                                        <div class="form-group">
                                                            <label for="">Nama Departemen</label>
                                                            <select name="dept_id" id="dept_id" class="form-control {{ $errors->has('departemen_id') ? 'is-invalid':'' }} selectpicker" data-live-search="true">
                                                                <option value="" disabled selected>Pilih Departemen</option>
                                                                @foreach ($departemens as $departemen)
                                                                <option value="{{ $departemen->id }}" @if($departemen->id == $jabatan->dept_id) selected @endif>{{ $departemen->nama_departemen }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Kode Jabatan</label>
                                                            <input type="text" name="jabatan" placeholder="Kode Cabang" class="form-control" value="{{ $jabatan->jabatan }}" required>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="">Status</label>
                                                            <select name="status" class="form-control" required>
                                                                <option value="1" @if($jabatan->status == 1) selected @endif>Aktif</option>
                                                                <option value="2" @if($jabatan->status == 2) selected @endif>Non-Aktif</option>
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

  $(function() {
        $("#dept_id").select2({
            placeholder: 'Pilih Departemen..',
            theme: "bootstrap-5",
            ajax: {
                        url: '{{ route('getdept') }}',
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
    });
</script>
@endsection