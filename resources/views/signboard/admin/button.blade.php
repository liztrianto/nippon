<button type="button" class="btn btn-info btn-sm" title="lihat" data-toggle="modal"
    data-target="#show{{ $id }}">
    <i class="fa fa-eye">  </i> Detail
</button> 


<a href="" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</a>

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