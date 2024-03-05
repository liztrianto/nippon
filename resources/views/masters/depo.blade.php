@extends('layouts.layout')

@section('title')
{{ config('app.name') }} | Data Depo
@endsection
    
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            
          <div class="col-sm-6">
            <h1 class="m-0">Data Depo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active">Depo</li>
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
                            <a  class="btn btn-success float-right " data-toggle="modal" data-target="#tambahDepo">
                                     Tambah Depo <i class="fa fa-plus"></i>
                                </a>   
                    
                        </div><!-- /.row -->

                        <!-- MODAL TAMBAH -->
                        <div class="modal fade" id="tambahDepo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                    <h4 class="modal-title" id="myModalLabel"><b>Tambahkan Depo</b></h4>
                                        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        
                                    </div>
                                    <form action="{{ route('depo.store') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Nama Depo</label>
                                                <input type="text" name="nama_depo" class="form-control" placeholder="Nama Depo" required>
                                            </div>  
                                            <div class="form-group">
                                                <label for="">Kode Depo</label>
                                                <input type="text" name="kode_depo" class="form-control" placeholder="Kode Depo" required>
                                            </div>  
                                            <!-- <div class="form-group">
                                                <label for="">Kepala Depo</label>
                                                <select name="kadepo_id" class="form-control {{ $errors->has('kadepo_id') ? 'is-invalid':'' }} selectpicker" data-live-search="true">
                                                    <option value="" disabled selected>Pilih Sales</option>
                                                    @foreach ($kadepos as $kadepo)
                                                    <option value="{{ $kadepo->id }}">{{ $kadepo->name }}</option>
                                                    @endforeach                                       
                                                 </select>
                                            </div>   -->
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
                                <th class="text-center">NAMA DEPO</th>
                                <th class="text-center">KODE DEPO</th>
                                <th class="text-center">KEPALA DEPO</th>
                                <th class="text-center">MANAGER</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">ACTION</th>
                            </thead>
                            <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($depos as $depo)
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td>{{ $depo->nama_depo }}</td>
                                        <td class="text-center">{{ $depo->kode_depo }}</td>
                                        <td class="text-center">
                                        @if($depo->nama_kadepo == null)
                                            <label class="label label-warning" >Belum Diset</label>
                                        @else
                                            {{$depo->nama_kadepo}}
                                        @endif
                                        </td>
                                        <td class="text-center">
                                        @if($depo->nama_manager == null)
                                            <label class="label label-warning" >Belum Diset</label>
                                        @else
                                            {{$depo->nama_manager}}
                                        @endif
                                        </td>
                                        
                                        <td class="text-center">
                                            @if($depo->status == 1 )
                                                <label class="label label-success">Aktif</label>
                                            @else
                                                <label class="label label-danger">Non-Aktif</label>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <!-- tombol action -->
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                data-target="#updateDepo{{ $depo->id }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>

                                            {{-- <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                                data-target="#hapusCabang{{ $depo->id }}">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>    --}}
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="updateDepo{{ $depo->id }}" role="dialog" aria-labelledby="myModalLabel">
                                        
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                
                                                <div class="modal-header text-center">                                                    
                                                    <h4 class="modal-title" id="myModalLabel">Edit <strong>{{ $depo->nama_depo }}</strong> ?</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                
                                                <form action="{{ route('depo.update', $depo->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('patch') }}
                                                    <div class="modal-body">
                                                        
                                                        <div class="form-group">
                                                            <label for="">Nama Depo</label>
                                                            <input type="text" name="nama_depo" placeholder="Nama Cabang" class="form-control" value="{{ $depo->nama_depo }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Kode Depo</label>
                                                            <input type="text" name="kode_depo" placeholder="Kode Cabang" 
                                                            class="form-control" value="{{ $depo->kode_depo }}" required>
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <label for="">Kepala Depo</label>
                                                            <select name="kadepo_id" id="kadepo_id" class="form-select form-control {{ $errors->has('kadepo_id') ? 'is-invalid':'' }}" data-live-search="true">
                                                                <option value="" disabled selected>Pilih Kepala Depo</option>
                                                                @foreach ($kadepos as $kadepo)
                                                                <option class="form-control" value="{{ $kadepo->id }}" @if( $kadepo->id == $depo->kadepo_id) selected @endif>{{ $kadepo->name }}</option>
                                                                @endforeach                                       
                                                            </select>
                                                        </div>  
                                                        <div class="form-group">
                                                            <label for="">Manager</label>
                                                            <select name="manager_id" id="manager_id" class="form-select form-control {{ $errors->has('manager_id') ? 'is-invalid':'' }}" data-live-search="true">
                                                                <option value="" disabled selected>Pilih Manager</option>
                                                                @foreach ($managers as $manager)
                                                                <option class="form-control" value="{{ $manager->id }}" @if( $manager->id == $depo->manager_id) selected @endif>{{ $manager->name }}</option>
                                                                @endforeach                                       
                                                            </select>
                                                        </div>  
                                                        
                                                        <div class="form-group">
                                                            <label for="">Status</label>
                                                            <select name="status" class="form-control" required>
                                                                <option value="1" @if($depo->status == 1) selected @endif>Aktif</option>
                                                                <option value="2" @if($depo->status == 2) selected @endif>Non-Aktif</option>
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
    var dtable =$("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    })
    .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

$(function() {

    
    $("#kadepo_id").select2({
        placeholder: 'Pilih Kepala Depo',
        theme: "bootstrap-5",
        // padding-bottom :"200px"
    });   
    $("#manager_id").select2({
        placeholder: 'Pilih Manager',
        theme: "bootstrap-5",
        // padding-bottom :"200px"
    });     
                                                          
});
</script>

@endsection