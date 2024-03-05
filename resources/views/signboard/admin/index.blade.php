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
              <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home </a></li>
              <li class="breadcrumb-item"><a href="#">Pengajuan Signboard</a></li>
              <!-- <li class="breadcrumb-item active">SignBoard</li> -->
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
                        <div class="row col-md-12"> 
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label>Filter Tanggal:</label>

                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="far fa-calendar-alt"></i>
                                    </span>
                                  </div>
                                  <input type="text" class="form-control float-right" id="reservation">
                                </div>
                                <!-- /.input group -->
                              </div>
                              
                              <!-- /.form group -->
                            </div>  

                            <div class="col-sm-3"> 
                               <label class="float">Filter Status</label>                          
                                <select name="filter_status" id="filter_status" style="width: 100%;"
                                    class="form-select" >
                                        <option value=" ">All</option>
                                        <option value="0">Menunggu Approval</option>
                                        <option value="1">Approved</option>
                                        <option value="2">Rejected</option>
                                        <option value="3">Pengajuan Vendor</option>
                                </select>  
                              
                            </div>
                          </div>   
                    <!-- <h3 class="m-0">Pengajuan SignBoard</h3> -->
                        <a href="{{ route('signboard.create')}}" class="btn btn-success btn-md float-sm-right" style="margin-top: 20px; margin-left: 9px; ">
                          <i class="fa fa-plus"></i> Tambah Pengajuan 
                        </a>      
                    </div>
                    <!-- /.card-header -->



                    <div class="card-body">                    
                        <table id="example1" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th></th>
                            <!-- <th></th> -->
                            <th class="text-center">ID</th>
                            <th>No</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Kode SAP</th>
                            <th>Nama Toko</th>
                            <th>Alamat</th>
                            <th>Kota / Kabupaten</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                        <tfoot>
                          <tr>
                              <th></th>
                              <!-- <th></th> -->
                              <th class="text-center">ID</th>
                              <th>No</th>
                              <th>Tanggal Pengajuan</th>
                              <th>Kode SAP</th>
                              <th>Nama Toko</th>
                              <th>Alamat</th>
                              <th>Kota / Kabupaten</th>
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


    $("#filter_status").select2({
              placeholder: 'Pilih ..',
              theme: "bootstrap-5",
          });

          $("#filter_status").change(function(){ 
              // $(".filter_status-reset option").remove();                
                var search = $(this).val();
                dtable.columns(0).search(search).draw();
                toastr.success(search);
            });
    var dtable = $("#example1").DataTable({
      processing: true,
        serverSide: true,
      ajax: '{{ route('signboard.json') }}',
                columns: [
                  { data: 'approve', name: 'approve', "visible": false },
                  { data: 'id', name: 'id', "visible": false },                    
                  { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false, className: "text-center"},
                  // { data: 'modal', name: 'modal', orderable: false,searchable: false }, 
                    { data: 'tanggal_pengajuan', name: 'tanggal_pengajuan', className: "text-center" },
                    { data: 'kode_sap', name: 'kode_sap', className: "text-center" },
                    { data: 'nama_toko', name: 'nama_toko'},
                    // { data: 'action', name: 'action', orderable: false ,width:"200px", responsive: false}, 
                    { data: 'alamat', name: 'alamat'},
                    { data: 'kota', name: 'kota'},
                    { data: 'status', name: 'status' ,width:"120px", responsive: false },
                    { data: 'button', name: 'button', orderable: false , responsive: false}, 
                                         
                ],
      "responsive": true,"order": [1, 'ASC'],
       "lengthChange": false, "autoWidth": false
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });
    // .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


    $('#reservation').daterangepicker()

$('#reservation').on('apply.daterangepicker', function (ev, picker) {
  var startDate = picker.startDate.format('YYYY-MM-DD');
var endDate = picker.endDate.format('YYYY-MM-DD');
// var startDate = picker.startDate.format('D-MM-Y');
// var endDate = picker.endDate.format('D-MM-Y');

// Perform DataTables search
// dtable.columns(4).search(startDate + '|' + endDate).draw();
// dtable.columns(4).search(startDate).draw();
dtable
    .columns()
    .search('')
    .draw();
dtable.columns(3) // Adjust the column index as needed
    .search(startDate+"|"+endDate, true, false)
    .draw();

toastr.success(startDate+'|' +endDate);
});
  });

  

 
</script>
@endsection
