@extends('layouts.layout')

@section('title')
{{ config('app.name') }} | List Permission
@endsection
    
@section('content')
<div class="content-wrapper">
    <!-- content header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            
          <div class="col-sm-6">
            <h1 class="m-0">List Permission</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active" ><a href="{{ route('permission.index') }}">Permission</a> </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content-header">
    

    <!-- Section konten -->
    <section class="content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <!-- <h3 class="box-title">List Permission</h3> -->
                            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#tambahPermission">
                                <i class="fa fa-plus"></i> Tambah Permission
                            </button>

                            <div class="modal fade" id="tambahPermission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title" id="myModalLabel">Tambahkan Permission</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form action="{{ route('permission.store') }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Nama Permission</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Nama Permission" required>
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="datatable" width="100%">
                                    <thead>
                                        <th class="text-center">#</th>
                                        <th class="text-center">NAMA PERMISSION</th>
                                        <th class="text-center">GUARD</th>
                                        <th class="text-center">ACTION</th>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @forelse($permission as $row)
                                        <tr>
                                            <td class="text-center">{{ $i++ }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->guard_name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('permission.user.list', $row->id) }}" class="btn btn-success btn-sm">
                                                    <i class="fa fa-user"></i> User
                                                </a>
                                                <a href="{{ route('permission.role.list', $row->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-briefcase"></i> Role
                                                </a>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#editPermission{{ $row->id }}">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button> 
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#hapusPermission{{ $row->id }}">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </button>   
                                            </td>
                                        </tr>
                                        <!-- modal edit  -->
                                        <div class="modal fade" id="editPermission{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h4 class="modal-title" id="myModalLabel">Update Permission <strong>{{ $row->name }}</strong> </h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form action="{{ route('permission.update', $row->id) }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('patch') }}
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="">Nama Permission</label>
                                                                <input type="text" name="name" class="form-control" placeholder="Nama Permission" value="{{ $row->name }}" required>
                                                            </div>  
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-info"><i class="fa fa-send"></i> UPDATE</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> BATAL</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- modal hapus -->
                                        <div class="modal fade" id="hapusPermission{{ $row->id }}" role="dialog" aria-labelledby="myModalLabel">

                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    
                                                    <div class="modal-header text-center">
                                                        <h4 class="modal-title" id="myModalLabel">Anda yakin ingin menghapus Permission : <strong>{{ $row->name }}</strong> ?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    
                                                    <form action="{{ route('permission.destroy', $row->id) }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <div class="modal-footer">
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
                                            <td colspan="4" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
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
                    targets: 3,
                    orderable: false,
                },
                { "width": "7%", "targets": 0}

            ],
            });
        });
    </script>
@endsection
