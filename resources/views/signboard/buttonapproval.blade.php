 <!-- tombol Approval -->
 @if($approve == 0 )
<button type="button" class="btn btn-success btn-sm" title="Approve" data-toggle="modal"
    data-target="#approve{{ $id }}" style="width:84px">
    <i class="fa fa-check"></i> Approve
</button> 
<button type="button" class="btn btn-danger btn-sm" title="Reject" data-toggle="modal"
    data-target="#reject{{ $id }}" style="width:84px">
    <i class="fas fa-xmark"></i> Reject
</button> 
@elseif($approve == 1 )
    <label class="label test-success">Approved</label><br>
    {{ date('d-M-Y h:i:s', strtotime($tanggal_approve)) }}
    <!-- <button type="button" class="btn btn-info btn-sm" title="Show" data-toggle="modal"
        data-target="#show{{ $id }}">
        <i class="fa fa-repeat"></i>
    </button>  -->
@else
    <label class="label label-danger">Rejected</label>
@endif

