@if($approve == 0 )
    <label class="text-info">
    <a href="" data-toggle="modal" class="text-info" data-target="#status{{ $id }}">
        Menunggu Approval
    </a>   
    </label><br>

@elseif($approve == 1 )
    <label class="text-success">
    <a href="" data-toggle="modal" class="text-success" data-target="#status{{ $id }}">
        Approved
    </a>   <br>
    </label><br>
    {{ date('d-M-Y h:i:s', strtotime($tanggal_approve)) }}
@elseif($approve == 2 )
    <label class="text-danger">
        <a href="" data-toggle="modal" class="text-danger" data-target="#status{{ $id }}">
            Rejected
        </a>
    </label><br>
    {{ date('d-M-Y h:i:s', strtotime($tanggal_approve)) }}
@else($approve == 3 )
    <label class="text-info">
        <a href="" data-toggle="modal" class="text-info" data-target="#status{{ $id }}">
            Pengajuan Vendor
        </a>
    </label>
    <!-- <br>
    {{ date('d-M-Y h:i:s', strtotime($tanggal_approve)) }} -->
@endif

<!-- MODAL SHOW  -->
<div class="modal fade " id="show{{ $id }}" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" style="width: 90%;">
        <div class="modal-content">
            
            <div class="modal-header">                                                    
            <h4 class="modal-title" id="myModalLabel">Detail Pengajuan Signboard <strong></strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <form action="" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}                                                    
                <div class="modal-body"> 
                    {{-- <img class="" src="{{  asset('assets/signboard/'.$upload_file) }}"  width="100%">   --}}
                    {{-- <img class="" src="{{  asset('storage/signboard/file/'.$upload_file) }}"  width="100%">   --}}
                    
                    <table class="table table-hover table-striped table-bordered col-mc-6">
                        <thead class="bg-secondary">
                            <tr>
                                <th width="40%">Uraian</th>
                                <th  colspan="2" width="60%">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody align="left">
                            <tr>
                                <th width="45%">Tanggal Pengajuan</th>
                                <td  colspan="2" width="40%" class="">{{ date('d-M-Y', strtotime($tanggal_pengajuan)) }}</td>
                            </tr>
                            <tr>
                                <th>Pengajuan</th>
                                <td colspan="2" >
                                    @if($jenis_pengajuan == 1 )
                                            Pemasangan Baru
                                    @elseif($jenis_pengajuan == 2 )
                                        Perbaikan
                                    @else
                                        Penurunan
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Depo</th>
                                <td colspan="2" >{{ $nama_depo }}</td>
                            </tr>
                            <tr>
                                <th>SAP kode cust</th>
                                <td colspan="2" >{{ $kode_sap }}</td>
                            </tr>
                            <tr>
                                <th>Nama Toko</th>
                                <td colspan="2" >{{ $nama_toko }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Lengkap</th>
                                <td colspan="2" >{{ $alamat }}</td>
                            </tr>
                            <tr>
                                <th>Telp. Toko</th>
                                <td colspan="2" >{{ $no_telp }}</td>
                            </tr>
                            <tr>
                                <th>Ukuran & design Reklame</th>
                                <td colspan="2"></td>
                            </tr>
                            <tr >
                                <th rowspan="6">Design ini digunakan untuk signboard yang terpasang menempel ( diseuaikan dengan lokasi)</th>
                                <td >1 SIGNBOARD Utama ( WAJIB ) 
                                    @if($design == 1)
                                        <img class="float-sm-right" src="{{ asset('assets/images/centang1.png')}}" height="30">
                                    @endif                                </td>
                                <td width="15%"> T:1MX3M</td>
                            </tr>
                            <tr>
                                <!-- <th>Updated By</th> -->
                                <td>2 SIGNBOARD  BLOBBY VARIAN 1  
                                <!-- <img class="float-sm-right" src="{{ asset('assets/images/centang.jpg')}}" height="20"> -->
                                    @if($design == 2)
                                        <img class="float-sm-right" src="{{ asset('assets/images/centang1.png')}}" height="30">
                                    @endif                                </td>
                                <td width="15%"> T:1MX3M</td>
                            </tr>
                            <tr>
                                <!-- <th>Updated By</th> -->
                                <td>3 SIGNBOARD  BLOBBY VARIAN 2
                                    @if($design == 3)
                                        <img class="float-sm-right" src="{{ asset('assets/images/centang1.png')}}" height="30">
                                    @endif
                                </td>
                                <td width="15%"> T:1MX3M</td>
                            </tr>
                            <tr>
                                <!-- <th>Updated By</th> -->
                                <td>4 SIGNBOARD  BLOBBY VARIAN 3
                                     @if($design == 4)
                                        <img class="float-sm-right" src="{{ asset('assets/images/centang1.png')}}" height="30">
                                    @endif                                </td>
                                <td width="15%"> T:1MX3M</td>
                            </tr>
                            <tr>
                                <!-- <th>Updated By</th> -->
                                <td>5 SIGNBOARD  BLOBBY VARIAN 4
                                    @if($design == 5)
                                        <img class="float-sm-right" src="{{ asset('assets/images/centang1.png')}}" height="30">
                                    @endif                                </td>
                                <td width="15%"> T:1MX3M</td>
                            </tr>
                            <tr>
                                <!-- <th>Updated By</th> -->
                                <td>6 SIGNBOARD  BLOBBY VARIAN 5
                                     @if($design == 6)
                                        <img class="float-sm-right" src="{{ asset('assets/images/centang1.png')}}" height="30">
                                    @endif                                </td>
                                <td width="15%"> T:1MX3M</td>
                            </tr>
                            <tr>
                                <th>Design ini digunakan untuk signboard yang terpasang menggunakan tiang</th>
                                <td>STANDING SIGNBOARD 
                                @if($design == 7)
                                        <img class="float-sm-right" src="{{ asset('assets/images/centang1.png')}}" height="30">
                                    @endif                                </td>
                                <td width="15%"> T:1MX3M</td>
                            </tr>
                            <tr>
                                <th></th>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th>Ukuran Pintu Harmonika</th>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th>Omset Toko</th>
                                <td colspan="2"> Rp. {{ $omset }} </td>
                            </tr>
                            <tr>
                                <th>Shop Size</th>
                                <td colspan="2"> {{ $shop_size }} </td>
                            </tr>
                            <tr>
                                <th>Pajak Reklame</th>
                                <td colspan="2">Rp.  {{ $pajak_reklame }} </td>
                            </tr>
                            <tr>
                                <th>Pengiriman ke</th>
                                <td colspan="2"> {{ $pengiriman }} </td>
                            </tr>
                        </tbody>
                    </table>
                     <br><br>
                    <!-- <img src="{{ route('approval.showphoto', $id) }}"  width="100%">  
                    <img src="{{ route('approval.showfile', $id) }}"  width="100%">   -->

                </div>
                
            </form>
        
        </div>
    </div>
</div> 


 <!-- MODAL SUBMIT -->
<div class="modal fade" id="submit{{ $id }}" role="dialog" aria-labelledby="myModalLabel">
    
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header text-center">                                                    
            <h4 class="modal-title" id="myModalLabel">Pengajuan Signboard <strong></strong></h4>
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
                    </div>
                    <div class="form-group">
                        <label for="">Nomor PO</label>
                        <input type="text" name="no_po" id="no_po" 
                                    class="form-control " 
                                    placeholder="Nomor PO">
                    </div>  
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea class="form-control" name="catatan" 
                        id="catatan" cols="60" rows="3"></textarea> 
                    </div>                  

                </div>
                <div class="modal-footer  ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    BATAL</button>

                    <!-- <button type="submit" name="action" value="reject" class="btn btn-danger float-sm-left" style="align-content: left; width:90px">BATAL</button> -->
                    <button type="submit" name="action" value="approve" class="btn btn-success float-sm-right" style="width:90px">SUBMIT</button>
                </div>
            </form>
        
        </div>
    </div>
</div>  

<!-- MODAL STATUS  -->
<div class="modal fade" id="status{{ $id }}" role="dialog" aria-labelledby="myModalLabel">                                
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header text-center">                                                    
                <h4 class="modal-title" id="myModalLabel">Status Pengajuan Signboard <strong></strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>            
                <div class="modal-body " align="left">                    
                    <table class="table table-hover table-striped table-bordered col-mc-6">
                        <tbody align="left">
                            <tr>
                                <th width="40%">Nama toko</th>
                                <td width="60%" class="">{{ $kode_sap.' - '. $nama_toko }} ( {{$kota}} )</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                @if($approve == 0 )
                                    <label class="text-info">
                                        Menunggu Approval
                                    </label><br>
                                @elseif($approve == 1 )
                                    <label class="label text-success">
                                        Approved
                                    </label><br>
                                    {{ date('d-M-Y h:i:s', strtotime($tanggal_approve)) }}
                                @else
                                    <label class="label text-danger">
                                            Rejected
                                    </label><br>
                                    {{ date('d-M-Y h:i:s', strtotime($tanggal_approve)) }}
                                @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Catatan</th>
                                <td>{{ $catatan }}</td>
                            </tr>
                        </tbody>
                    </table>
              

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        
        </div>
    </div>
</div>  


 

