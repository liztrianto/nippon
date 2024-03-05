@if($approve == 0 )
<button type="button" class="btn btn-success btn-sm" title="Approve" data-toggle="modal"
    data-target="#approve{{ $id }}" style="width:90px">
    <i class="fa fa-check"></i> Approval
</button> 

@elseif($approve == 1 )
    <label class="label test-success">
    <a href="" data-toggle="modal"  data-target="#status{{ $id }}">
        Approved
    </a>   
    </label><br>
    {{ date('d-M-Y h:i:s', strtotime($tanggal_approve)) }}
    <!-- <button type="button" class="btn btn-info btn-sm" title="Show" data-toggle="modal"
        data-target="#show{{ $id }}">
        <i class="fa fa-repeat"></i>
    </button>  -->
@elseif($approve == 2 )
    <label class="label label-danger">
        <a href="" data-toggle="modal"  data-target="#status{{ $id }}">
            Rejected
        </a>
    </label><br>
    {{ date('d-M-Y h:i:s', strtotime($tanggal_approve)) }}
@elseif($approve == 3 )
<label class="label label-danger">
    <a href="" data-toggle="modal"  data-target="#status{{ $id }}">
        Pengajuan Vendor
    </a>
</label><br>
{{ date('d-M-Y h:i:s', strtotime($tanggal_approve)) }}
@endif



 <!-- MODAL APPROVE -->
<div class="modal fade" id="approve{{ $id }}" role="dialog" aria-labelledby="myModalLabel">
    
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header text-center">                                                    
            <h4 class="modal-title" id="myModalLabel">Approval Pengajuan Signboard <strong></strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <form action="{{ route('approval.approve', $id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}                                                    
                <div class="modal-body">                                                        
                    <div class="form-group" >
                        <center>
                        <label for=""> Toko {{ $nama_toko }} ( {{$kota}} )</label>
                        </center>
                    </div>
                    <div class="form-group">
                        <label for="">Catatan</label>
                        <textarea class="form-control" name="catatan" 
                        id="catatan" cols="60" rows="3"></textarea> 
                    </div>                  

                </div>
                <div class="modal-footer  ">
                    <button type="submit" name="action" value="reject" class="btn btn-danger float-sm-left" style="align-content: left; width:90px">REJECT</button>
                    <!-- <button type="submit" name="action" value="approve" class="btn btn-success float-sm-right">APPROVE</button> -->
                <!-- </div>
                <div class="modal-footer float-sm-right "> -->
                    <!-- <button type="submit" name="action" value="reject" class="btn btn-danger float-sm-left" style="align-content: left;">REJECT</button> -->
                    <button type="submit" name="action" value="approve" class="btn btn-success float-sm-right" style="width:90px">APPROVE</button>
                </div>
            </form>
        
        </div>
    </div>
</div>  

<!-- MODAL STATUS  -->
<div class="modal fade" id="status{{ $id }}" role="dialog" aria-labelledby="myModalLabel">                                
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header text-center">                                                    
                <h4 class="modal-title" id="myModalLabel">Status Pengajuan Signboard <strong></strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>            
                <div class="modal-body " align="left">                    
                    <table class="table table-hover table-striped table-bordered col-mc-6">
                        <tbody align="left">
                            <tr>
                                <th width="40%">Nama toko</th>
                                <td width="60%" class="">{{ $kode_sap.' - '. $nama_toko }} ( {{$kota}} )</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                @if($approve == 1 )
                                    <label class="label test-success">
                                        Approved
                                    </label><br>
                                    {{ date('d-M-Y h:i:s', strtotime($tanggal_approve)) }}
                                @else
                                    <label class="label label-danger">
                                            Rejected
                                    </label><br>
                                    {{ date('d-M-Y h:i:s', strtotime($tanggal_approve)) }}
                                @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Catatan</th>
                                <td>{{ $catatan }}</td>
                            </tr>
                        </tbody>
                    </table>
              

                </div>
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn btn-primary">REJECT</button> -->
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        
        </div>
    </div>
</div>  


                            