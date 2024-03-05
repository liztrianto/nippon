<div class="modal fade" id="editstatus" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit status <strong>}</strong> ?</h4>
            </div>
            
            <form action="" method="post">
                {{ csrf_field() }}
                {{ method_field('patch') }}
                <div class="modal-body">
                    
                    <div class="col-md-12">
                        <div class="col-sm-5">
                            <label for="">Status Pengajuan Perbaikan</label>
                        </div>
                        <div class="col-sm-7" >
                            <select name="status" class="form-control" required>
                                
                            </select>
                            <p class="text-danger"></p>
                        </div>    
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

<div class="modal fade" id="lihatstatus" role="dialog" aria-labelledby="myModalLabel">                               
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
</div>

<div class="modal fade" id="detailperbaikan{{ $id }}" role="dialog" aria-labelledby="myModalLabel">                               
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            
            <div class="modal-header text-center">
                <h4 class="modal-title" id="myModalLabel">Detail Pengajuan Signboard <strong></strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="col-md-6">
                            <table class="table table-hover table-striped table-bordered col-mc-6">
                            <tbody>
                                <tr>
                                    <th>
                                        Nama Toko
                                    </th>
                                    <td>
                                        {{ $nama_toko }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Jenis Surat
                                    </th>
                                    <td>
                                    
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Status
                                    </th>
                                    <td>
                                        
                                            <label class='label label-success'>Aktif</label>
                                        
                                            <label class='label label-danger'>Non-Aktif</label>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Created By
                                    </th>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Updated By
                                    </th>
                                    <td>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                                <table class="table table-hover table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <th>
                                        Nama Toko
                                    </th>
                                    <td>
                                        {{ $nama_toko }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Jenis Surat
                                    </th>
                                    <td>
                                    
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Status
                                    </th>
                                    <td>
                                        
                                            <label class='label label-success'>Aktif</label>
                                        
                                            <label class='label label-danger'>Non-Aktif</label>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Created By
                                    </th>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Updated By
                                    </th>
                                    <td>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> CLOSE</button>
            </div>
        
        </div>
    </div>
</div>


@can('perbaikan-hapus')
<div class="modal fade" id="hapusPerbaikan{{ $id }}" role="dialog" aria-labelledby="myModalLabel">
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
                    <button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> HAPUS</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>BATAL</button>
                </center>
            </div>
        </form>     
        </div>                                         
    </div>
</div> 

<button type="button" class="btn btn-danger btn-xs" title="Hapus" data-toggle="modal"
    data-target="#hapusPerbaikan{{ $id }}">
    <i class="fa fa-trash"></i>
</button>   
@endcan