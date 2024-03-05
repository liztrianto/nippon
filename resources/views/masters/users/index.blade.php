@extends('layouts.layout')

@section('title')
{{ config('app.name') }} | Data User
@endsection
    
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            
          <div class="col-sm-6">
            <h1 class="m-0">Data User</h1>
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
            <div class="col-12">
                <div class="card card-danger card-outline">
                    <div class="card-header">
                        <div class="row col-sm-12">                            
                            <!-- <div class="col-sm-6"> -->
                            <a href="{{ route('users.create')}}" class="btn btn-success float-right ">
                                     Tambah User Baru<i class="fa fa-plus"></i>
                                </a>   
                            <!-- </div>/.col -->
                            <!-- <div class="col-sm-6"> -->
                                
                            <!-- </div>/.col -->
                        </div><!-- /.row -->
                                
                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                        <tr>

                            <th class="text-center">ID</th>
                            <th class="text-center">#</th>
                            <th>Nama User</th>
                            <th>Depo</th>
                            <th>Departemen</th>
                            <!-- <th>Role</th> -->
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">#</th>
                            <th>Nama User</th>
                            <th>Depo</th>
                            <th>Departemen</th>
                            <!-- <th>Role</th> -->
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
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
    $("#datatable").DataTable({
      ajax: '{{ route('users.json') }}',
                columns: [
                    { data: 'id', name: 'id', "visible": false },
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false, className: "text-center"},
                    { data: 'name', name: 'name', className: "text-center" },
                    { data: 'nama_depo', name: 'nama_depo'},
                    { data: 'nama_departemen', name: 'nama_departemen'},
                    // { data: 'kota', name: 'kota'},
                    { data: 'active', name: 'active' },
                    { data: 'action', name: 'action', orderable: false, searchable: false},
                ],
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection
