@extends('layouts.layout')

@section('title')
  {{ config('app.name') }} | Controller Sign Board
@endsection
@push('style')
<style>
    #datatable> thead> tr> th{
        font-size: 12px;
    }

    #datatable> tbody> tr> td{
        font-size: 12px;
    }
    
</style>
@endpush

    
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            
          <div class="col-sm-6">
            <h1 class="m-0">Controller Pengajuan SignBoard</h1>
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
            <div class="col-12">
                <div class="card card-danger card-outline">
                    <div class="card-header">
                      <!-- <br> -->
                      <form action="{{route('controller.export')}}"  method="GET">
                        <div class="row col-md-12"> 
                          <div class="col-sm-3"> 
                                <label class="float">Filter Depo</label>                          
                                  <select name="filter_depo" id="filter_depo" style="width: 100%;"
                                      class="form-select" required >
                                      <option value="" disabled selected>Pilih Depo</option>
                                      <option value=" " >All</option>
                                          @foreach ($depos as $depo)
                                          <option value="{{ $depo->nama_depo }}">{{ $depo->nama_depo }}</option>
                                          @endforeach
                                  </select>  
                                
                              </div>   
                              <div class="col-sm-3"> 
                                <label class="float">Filter Status</label>                          
                                  <select name="filter_status" id="filter_status" style="width: 100%;"
                                      class="form-select" required >
                                          <option value="" disabled selected>Pilih Status</option>
                                          <option value=" ">All</option>
                                          <option value="0">Menunggu Approval</option>
                                          <option value="1">Approved</option>
                                          <option value="2">Rejected</option>
                                          <option value="3">Pengajuan Vendor</option>
                                  </select>  
                                
                              </div>
                              
                              <div class="col-sm-3">
                                <div class="form-group" style="width:100%;" >
                                  <label>Filter Tanggal:</label>

                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                      </span>
                                    </div>
                                    <input type="date" class="form-control" name="startDate" id="input-datepicker" 
                                    placeholder="Tanggal awal" required>
                                  </div>
                                  <!-- /.input group -->
                                </div>
                                
                                <!-- /.form group -->
                              </div>    
                              
                              <div class="col-sm-3">
                                <div class="form-group" style="width:100%;" >
                                  <label>Filter Tanggal:</label>
                                  
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i> 
                                      </span>
                                    </div>
                                    <input type="date" class="form-control" name="endDate" id="input-datepicker" 
                                    placeholder="Tanggal akhir" required>
                                  </div>
                                  <!-- /.input group -->
                                </div>
                              </div>
                              
                              <div class="col-sm-3">

                                <button type="submit" class="btn btn-success btn-sm" name="action" value="excel">
                                  <i class="fas fa-file-excel"></i>  Export Excel</button>
                              </div>
							    <!-- <button type="submit" class="btn btn-primary btn-sm" name="action" value="pdf"><i class="fa fa-file"></i> PDF</button> -->
                              
                            </div>
                          </form>
                                
                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">ID</th>
                            <th>No</th>
                            <th>Status</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Kode SAP</th>
                            <th>Nama Toko</th>
                            <th>Alamat</th>
                            <th>Kota / Kabupaten</th>
                            <th>Depo</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        
                        <tbody>                     
                                  
                                                       
                        </tbody>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th class="text-center">ID</th>
                            <th>No</th>
                            <th>Status</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Kode SAP</th>
                            <th>Nama Toko</th>
                            <th>Alamat</th>
                            <th>Kota / Kabupaten</th>
                            <th>Depo</th>
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
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content"> 
            <div class="modal-header" id="modal-header">
              <h4 class="modal-title" id="modal-title">Form Input</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body" id="modal-body">
            </div>
            
            <div class="modal-footer" id="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button"  id="modal-btn-save"></button>
            </div>
        </div>
    </div>
  </div>
  @endsection
@section('js-extra')


<script>
   
    $(function() {     

      var dtable =$("#datatable").DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('controller.jsonall') }}',
                columns: [                  
                  { data: 'approve', name: 'approve', "visible": false },
                  { data: 'id', name: 'id', "visible": false },
                  { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false,
                     className: "text-center"},
                  { data: 'approval', name: 'approval', className: "text-center"},
                    { data: 'tanggal_pengajuan', name: 'tanggal_pengajuan'},
                    { data: 'kode_sap', name: 'kode_sap', className: "text-center" },
                    { data: 'nama_toko', name: 'nama_toko'},
                    { data: 'alamat', name: 'alamat'},
                    { data: 'kota', name: 'kota'},
                    { data: 'depo', name: 'depo'},
                    { data: 'action', name: 'action',  orderable: false, searchable: false,  },
                ], 
                "order": [0, 'ASC'],
      "responsive": true, "lengthChange": true, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });
    // .buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');

        $("#filter_depo").select2({
            placeholder: 'Pilih Depo ..',
            theme: "bootstrap-5",
            
        });
       
     
            $("#filter_status").select2({
              placeholder: 'Pilih Status..',
              theme: "bootstrap-5",
          });

            $("#filter_depo").change(function(){ 
              // $(".filter_depo-reset option").remove();                
                var search = $(this).val();
                dtable.columns(9).search(search).draw();
                // toastr.success(search);
            });

            $("#filter_status").change(function(){ 
              // $(".filter_status-reset option").remove();                
                var search = $(this).val();
                dtable.columns(0).search(search).draw();
                toastr.success(search);
            });
           
            

              $("#filter").change(function(){ 
              $(".filter-reset option").remove();             
                var search = $(this).val();
                dtable.columns(0).search(search).draw();
                toastr.success(search);
                
            });


          $('#toggle').click(function () {
            // $(".toggle-reset option").remove();
            if ($(this).is(':checked')) {
              $("#filter_depo").select2({
                  placeholder: 'Pilih Depo ..',
                  theme: "bootstrap-5",
                  ajax: {
                              url: '{{ route('getdepoall') }}',
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
              
            } else {
                
                var url = "{{ route('getdepot', ":idmanager") }}";
                url     = url.replace(':idmanager', idmanager);
                
                $("#filter_depo").select2({
                    placeholder: 'Pilih Depo ...',
                    theme: "bootstrap-5",
                    ajax: {
                        url: url,
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
                dtable.draw();

                
            }
        });


           
        // $('#reservation').daterangepicker()
        $('#reservation').daterangepicker({
            opens: 'left', // Adjust the position of the calendar picker
            autoApply: true // Automatically apply the selection when dates are chosen
        });

        $('#reservation').on('apply.daterangepicker', function (ev, picker) {
          var startDate = picker.startDate.format('YYYY-MM-DD');
        var endDate = picker.endDate.format('YYYY-MM-DD');
        // var startDate = picker.startDate.format('D-MM-Y');
        // var endDate = picker.endDate.format('D-MM-Y');

        // Perform DataTables search
        // dtable.columns(5).search(startDate + '|' + endDate).draw();
        // dtable.columns(4).search(startDate).draw();
        var dateRange = $('#reservation').val();

        dtable
            .columns()
            .search('')
            .draw();

        // if (dateRange) {
        //     dtable
        //         .columns(4) // Adjust the column index as needed
        //         .search(dateRange, true, false)
        //         .draw();
        // }

        // dtable.columns(4) // Adjust the column index as needed
        //     .search(dateRange, true, false)
        //     .draw();
        dtable.columns(4) // Adjust the column index as needed
            .search(startDate+"|"+endDate, true, false)
            .draw();

        // toastr.success(dateRange);
        toastr.success(startDate+' - ' +endDate);
    });


     
    $('#daterange-btn').on('apply.daterangepicker', function (ev, picker) {
          var startDate = picker.startDate.format('YYYY-MM-DD');
        var endDate = picker.endDate.format('YYYY-MM-DD');
        // var startDate = picker.startDate.format('D-MM-Y');
        // var endDate = picker.endDate.format('D-MM-Y');

        // Perform DataTables search
        // dtable.columns(4).search(startDate + 'to' + endDate).draw();
        // dtable.columns(4).search(startDate).draw();

        toastr.success(startDate+' + ' +endDate);
    });




    // $(document).on('click','.detail', function(){
    //   let id = $(this).attr('id');
    //   toastr.success(id);

    // })

        });


   
    </script>
@endsection
