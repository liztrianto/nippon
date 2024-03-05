<form action="{{ route('controller.update', $model->id) }}" method="post">
    {{ csrf_field() }}
    <div class="modal-body">
        <div class="form-group">
            <label for=""></label>
            
        </div>  
        <div class="form-group">
            <label for="">Nomor PO</label>
            <input type="text" name="nomor_po" class="form-control {{ $errors->has('nomor_po') ? 'is-invalid':'' }}" placeholder="Nomor PO" required>
            
        </div>  
        <div class="form-group">
            <label for="">Keterangan</label>
            <textarea class="form-control" name="keterangan" 
            id="catatan" cols="60" rows="3"></textarea> 
        </div>  
    </div>
            </form>

 


  
