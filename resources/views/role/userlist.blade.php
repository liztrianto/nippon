@extends('layouts.layout')

@section('title')
{{ config('app.name') }} | Role User List 
@endsection
    
@section('content')
<div class="content-wrapper">
    <!-- content header -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            
          <div class="col-sm-6">
            <h1 class="m-0">Role User List</h1><br>
                <a href="{{ route('role.index')}}" class="btn btn-danger"><< KEMBALI </a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item " ><a href="{{ route('role.index') }}">Role</a> </li>
              <li class="breadcrumb-item active" ><a href="#">Role User List</a> </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>  

    <!-- Section konten -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger card-outline">
                    <div class="card-header ">
                        <h3 class="card-title">List User yang dimiliki Role <strong>{{ $role->name }}</strong></h3>
                        <button type="button" class="btn btn-success float-sm-right" data-toggle="modal" data-target="#tambahUser">
                            <i class="fa fa-plus"></i> Tambah User
                        </button>

                        <div class="modal fade" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title" id="myModalLabel">Tambahkan User</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('role.user.add', $role->id) }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Nama User</label>
                                                <select name="user_id[]" class="form-select select2" id="user_id" data-live-search="true" multiple>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>  
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> SIMPAN</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> BATAL</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <div class="table-responsive"> -->
                            <table class="table table-bordered table-hover" id="datatable" width="100%">
                                <thead>
                                    <th class="text-center">#</th>
                                    <th class="text-center">NAMA USER</th>
                                    <th class="text-center">ACTION</th>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @forelse($role->users as $row)
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#hapusUser{{ $row->id }}">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>   
                                        </td>
                                    </tr>

                                    <!-- modal hapus -->
                                    <div class="modal fade" id="hapusUser{{ $row->id }}" role="dialog" aria-labelledby="myModalLabel">

                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title" id="myModalLabel">Hapus User <strong>{{ $row->name }}</strong> dari <strong>{{ $role->name }}</strong> ?</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                
                                                <form action="{{ route('role.user.delete', $role->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="user_id" value="{{ $row->id }}">
                                                        <center>
                                                            <button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> HAPUS</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> BATAL</button>
                                                        </center>
                                                    </div>
                                                </form> 
                                                    
                                            </div>                                         
                                        </div>
                                    </div> 

                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Role belum mempunyai User.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        <!-- </div> -->
                    </div>
                </div>   
            </div>
        </div>        

    </div>
    </section>
</div>
@endsection

@section('js-extra')
    <script>
        $(document).ready( function(){
            $('#datatable').DataTable({
            columnDefs: [
                //untuk menghilangkan order
                {
                    targets: 2,
                    orderable: false,
                },
                { "width": "7%", "targets": 0}

            ],
            });
        });

        $("#user_id").select2({
            // placeholder: 'Pilih User',
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
            
        }); 
    </script>
@endsection
