 <!-- tombol Action  -->
 <button type="button" class="btn btn-info btn-sm" title="Detail"
 
 style="width:80px;margin-top: 5px;">
    <i class="fa fa-eye"></i> Detail
</button> 
<!-- <button type="button" class="btn btn-info btn-sm" title="Submit" data-toggle="modal"
    data-target="#show{{ $id }}" style="width:80px;margin-top: 5px;">
    <i class="fa fa-eye"></i> Detail
</button>  -->
@if($approve == 1 )
<!-- <br> -->
<button type="button" class="btn btn-success btn-sm" title="Show" data-toggle="modal"
    data-target="#submit{{ $id }}" style="width:80px; margin-top: 5px;">
    <i class="fa fa-file"></i> Submit
</button> 
@endif
