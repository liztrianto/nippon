<!-- <div class="modal fade" id="lihatstatus{{ $id }}" role="dialog" aria-labelledby="myModalLabel">                               
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Status Pengajuan Perbaikan <strong></strong> ?</h4>
            </div>
            
            <div class="modal-body">
                <table width="100%">                    
                    <tr>
                        <td valign="top" class="text-left" height="30px"><b>Status Pengajuan</b></td>
                        <td valign="top"><b>:</b></td>
                        <td valign="top" class="text-left"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> CLOSE</button>
            </div>
        
        </div>
    </div>
</div> -->

<!-- APPROVE -->

<button type="button" class="btn btn-danger btn-xs" title="Reject" data-toggle="modal"
    data-target="#reject{{ $id }}">
    <i class=""> Reject</i>
</button> 


<div class="modal fade" id="approve{{ $id }}" role="dialog" aria-labelledby="myModalLabel">
                                
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header text-center">                                                    
                <h4 class="modal-title" id="myModalLabel">Approve Pengajuan Signboard <strong></strong> ?</h4>
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
                        
                        <!-- <label for=""> Data Toko  </label> <br>
                        Nama Toko : {{ $nama_toko}} <br>
                        Kode SAP : {{ $kode_sap }} <br> -->

                    </div>
                    <div class="form-group">
                        <label for="">Catatan</label>
                        <textarea class="form-control" name="catatan" 
                        id="catatan" cols="60" rows="3"></textarea> 
                    </div>
                    

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">APPROVE</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                </div>
            </form>
        
        </div>
    </div>
</div>  

<!-- MODAL Reject -->

<div class="modal fade" id="reject{{ $id }}" role="dialog" aria-labelledby="myModalLabel">
                                
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header text-center">                                                    
                <h4 class="modal-title" id="myModalLabel">Reject Pengajuan Signboard <strong></strong> ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <form action="{{ route('approval.reject', $id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}    
                <div class="modal-body">
                    
                    <div class="form-group" >
                        <center>
                        <label for=""> Toko {{ $nama_toko }} ( {{$kota}} )</label>
                        </center>
                        
                        <!-- <label for=""> Data Toko  </label> <br>
                        Nama Toko : {{ $nama_toko}} <br>
                        Kode SAP : {{ $kode_sap }} <br> -->

                    </div>
                    <div class="form-group">
                        <label for="">Catatan</label>
                        <textarea class="form-control" name="catatan" 
                        id="catatan" cols="60" rows="3"></textarea> 
                    </div>
                    

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">REJECT</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                </div>
            </form>
        
        </div>
    </div>
</div>  

<!-- 
<button type="button" class="btn btn-success btn-xs" title="Approve" data-toggle="modal"
    data-target="#approve{{ $id }}">
    <i class=""> Approve</i>
</button>  -->

