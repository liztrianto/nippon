<!-- <a href="{{ $url_show }}" class="btn btn-warning btn-xs btn-show" title="Detail: {{ $model->nama_toko }}"
style="width:80px; margin-top: 5px;"><i class="fa fa-eye"></i> Show</a>  -->
<button href="{{ $url_show }}"  type="button" class="btn btn-info btn-sm  btn-show" title="Detail: {{ $model->nama_toko }} - {{ $model->no_document}} " 
     style="width:80px">
    <i class="fa fa-eye"></i> Detail
</button>
<!-- @if($model->approve == 0 ) -->
<!-- <a href="{{ $url_edit }}" class="btn btn-success btn-sm modal-edit edit" 
style="width:80px;" title="Submit : {{ $model->nama_toko }}">
<i class="fa fa-edit"></i> Submit</a> -->
<!-- <button type="button" class="btn btn-success btn-xs" title="Show" data-toggle="modal"
    data-target="#submit{{ $model->id }}" style="width:80px; margin-top: 5px;">
    <i class="fa fa-file"></i> Submit
</button>  -->
<!-- @endif -->