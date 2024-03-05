@extends('layouts.layout')

@section('title')
{{ config('app.name') }} | Approval Sign Board
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            
          <div class="col-sm-6">
            <h1 class="m-0">Approval Pengajuan SignBoard</h1>
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
                        <div class="row col-md-12"> 
                        <div class="col-sm-3"> 
                               <label class="float">Filter Depo</label>                          
                                <select name="filter_depo" id="filter_depo" style="width: 100%;"
                                    class="form-select" >
                                    <option value="" disabled selected>Pilih Depo</option>
                                    <option value=" ">All</option>
                                        @foreach ($depos as $depo)
                                         
                                        <option value="{{ $depo->nama_depo }}">
                                             
                                            {{ $depo->nama_depo }}
                                        </option>
                                        @endforeach
                                </select>  
                              
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
                            <!-- <div class="col-sm-2">
                              <label class="float">Filter Depo</label>
                            </div> 
                            <div class="col-sm-10">
                                <select name="toko_id" id="category_depo" 
                                  class="form-select" style="width: 100%;">
                                  <option value="all" disabled selected>Pilih Filter Depo</option>
                                  <option value="all" >All Depo</option>
                                  <option value="filter" >Responsible Depo</option>                                    
                                </select> 
                                <p></p>
                            </div> -->

                            <!-- <div class="col-sm-2">
                              <label class="float">Pilih Depo</label>
                            </div> 
                            <div class="col-sm-10">
                           
                                <select name="filter_depo" id="filter_depo" style="width: 100%;"
                                    class="form-select" >
                                </select>   -->
                                <!-- <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="" >
                                  <label for="customCheckbox1" class="custom-control-label">Show All Depo</label>
                                </div> -->
                                <!-- <div class="custom-control  custom-checkbox" > 
                                  <input class="custom-control-input" type="checkbox" id="toggle" >  -->
                                  <!-- <span style="font-size:18px;">Show All Depo.</span> -->
                                  <!-- <label for="toggle" class="custom-control-label">Show All Depo</label>

                                </div>    -->
                                <!-- <div class="custom-control">
                                  <input class="custom-control-input" type="checkbox" id="toggle" value="toggle">
                                  <label for="" class="custom-control-label">Custom Checkbox</label>
                                </div>                            -->
                            <!-- </div>                                         -->
                           
                        </div>
                                
                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">ID</th>
                            <th>No</th>
                            <th>Action</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Kode SAP</th>
                            <th>Nama Toko</th>
                            <th>Alamat</th>
                            <th>Kota / Kabupaten</th>
                            <th>Depo</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        
                        <tbody>                      
                                   
                                                       
                        </tbody>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th class="text-center">ID</th>
                            <th>No</th>
                            <th>Action</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Kode SAP</th>
                            <th>Nama Toko</th>
                            <th>Alamat</th>
                            <th>Kota / Kabupaten</th>
                            <th>Depo</th>
                            <th>Status</th>
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
   $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
</script>
<script>
    $(function() {

            var idmanager = {{ Auth()->user()->id }};
            var url = "{{ route('getdepot', ":idmanager") }}";
                url     = url.replace(':idmanager', idmanager);
                
                $("#filter_depo").select2({
                    // placeholder: 'Pilih Depo ...',
                    theme: "bootstrap-5",
                    // ajax: {
                    //     url: url,
                    //     dataType: 'json',
                    //     delay: 250,
                    //     data: function(params) {
                    //         return {
                    //             term: params.term || '',
                    //             page: params.page || 1
                    //         }
                    //     },
                    //     cache: true
                    // }
                    
                }); 

                $("#filter_status").select2({
                    placeholder: 'Pilih ..',
                    theme: "bootstrap-5",
                });

                $("#filter").select2({
                    placeholder: 'Pilih ..',
                    theme: "bootstrap-5",
                });

      var dtable =$("#datatable").DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('approval.jsonall') }}',
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
                    { data: 'action', name: 'action',  orderable: false, searchable: false},
                ], 
                "order": [3, 'ASC'],
      "responsive": true, "lengthChange": false, "autoWidth": false,
    });
    // .buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');            
                // var search = $("input[name='filter_depo']").val();  
                // dtable.columns(8).search(search).draw();

            $("#filter_depo").change(function(){ 
              $(".filter_depo-reset option").remove();                 
                var search = $(this).val();
                dtable.columns(9).search(search).draw();
                toastr.success(search);
            });
            
            $("#filter_status").change(function(){ 
              $(".filter_status-reset option").remove();                
                var search = $(this).val();
                dtable.columns(0).search(search).draw();
                toastr.success(search);
            });
           
            

              $("#filter").change(function(){ 
              $(".filter_depo-reset option").remove();
             
                var search = $(this).val();
                dtable.columns(0).search(search).draw();
                toastr.success(search);
                
            });
        //   $('#toggle').click(function () {
        //     $(".filter_depo-reset option").remove();
        //     // $(".toggle-reset option").remove();
        //     if ($(this).is(':checked')) {
        //       $("#filter_depo").select2({
        //           placeholder: 'Pilih Depo ..',
        //           theme: "bootstrap-5",
        //           ajax: {
        //                       url: '{{ route('getdepoall') }}',
        //                       dataType: 'json',
        //                       delay: 250,
        //                       data: function(params) {
        //                           return {
        //                               term: params.term || '',
        //                               page: params.page || 1
        //                           }
        //                       },
        //                       cache: true
        //                   }
        //       });
              
        //     } else {
        //       $(".filter_depo-reset option").remove();
        //         var url = "{{ route('getdepot', ":idmanager") }}";
        //         url     = url.replace(':idmanager', idmanager);
                
        //         $("#filter_depo").select2({
        //             placeholder: 'Pilih Depo ...',
        //             theme: "bootstrap-5",
        //             ajax: {
        //                 url: url,
        //                 dataType: 'json',
        //                 delay: 250,
        //                 data: function(params) {
        //                     return {
        //                         term: params.term || '',
        //                         page: params.page || 1
        //                     }
        //                 },
        //                 cache: true
        //             }
        //         });      
        //         dtable.draw();

                
        //     }
        // });


            
        });

        $('#reservation').daterangepicker()

        $('#reservation').on('apply.daterangepicker', function (ev, picker) {
          
        //   var startDate = picker.startDate.val();
        // var endDate = picker.endDate.val();
          var startDate = picker.startDate.format('YYYY-MM-DD');
        var endDate = picker.endDate.format('YYYY-MM-DD');
        // var startDate = $('#startDate').val();
        // var endDate = $('#endDate').val();
        // var startDate = picker.startDate.format('D-MM-Y');
        // var endDate = picker.endDate.format('D-MM-Y');

        // Perform DataTables search
        dtable.columns(4).search(startDate + '|' + endDate).draw();
        // dtable.columns(4).search(startDate).draw();

        // dtable.columns(4) // Adjust the column index as needed
        //     .search(startDate + '|' + endDate, true, false)
        //     .draw();

        toastr.success(startDate+ '-' +endDate);
        });
    </script>
@endsection

