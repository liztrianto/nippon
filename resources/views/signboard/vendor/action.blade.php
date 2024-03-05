<!-- @if($model->approve == 3 ) -->
<a href="{{ $url_edit }}" class="btn btn-primary btn-xs modal-edit edit" 
style="width:80px; margin-top: 5px;" title="Submit : {{ $model->nama_toko }}">
<i class="fa fa-edit"></i> Submit</a>
<!-- <button type="button" class="btn btn-success btn-xs" title="Show" data-toggle="modal"
    data-target="#submit{{ $model->id }}" style="width:80px; margin-top: 5px;">
    <i class="fa fa-file"></i> Submit
</button>  -->
<!-- @endif -->