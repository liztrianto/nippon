@if($approve == 0 )
<label class="label test-success">
        Menunggu Approval
    </label>
@elseif($approve == 1 )
    <label class="label test-success">
    <a href="" data-toggle="modal"  data-target="#status{{ $id }}">
        Approved
    </a>   
    </label><br>
    <!-- {{ date('d-M-Y h:i:s', strtotime($tanggal_approve)) }} -->
@elseif($approve == 2 )
    <label class="label test-success">
    <a href="" data-toggle="modal"  data-target="#status{{ $id }}">
        Rejected
    </a>   
    </label><br>
@else
    <label class="label label-danger">
        <a href="" data-toggle="modal"  data-target="#status{{ $id }}">
            Pengajuan Vendor
        </a>
    </label><br>
    <!-- {{ date('d-M-Y h:i:s', strtotime($tanggal_approve)) }} -->
@endif

<!-- MODAL SHOW  -->
<div class="modal fade " id="show{{ $id }}" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" style="width: 90%;">
        <div class="modal-content">
            
            <div class="modal-header">                                                    
            <h4 class="modal-title" id="myModalLabel">Detail Pengajuan Signboard <strong></strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>                                                  
                <div class="modal-body"> 
                    <!-- <img src="{{ route('approval.showphoto', $id) }}" alt="{{$upload_file}}" width="100%">   -->
                    <table class="table table-hover table-striped table-bordered col-mc-6">
                        <thead class="bg-secondary">
                            <tr>
                                <th width="40%">Uraian</th>
                                <th  colspan="2" width="40%">Keterangan</th>
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
                                    
                                        <img class="float-sm-right" src="{{ asset('assets/images/centang1.png')}}" height="30">
                                                                 </td>
                                <td width="15%"> T: 1M X 3M</td>
                            </tr>
                            <tr>
                                <!-- <th>Updated By</th> -->
                                <td>2 SIGNBOARD  BLOBBY VARIAN 1  
                                <!-- <img class="float-sm-right" src="{{ asset('assets/images/centang.jpg')}}" height="20"> -->
                                    
                                        <img class="float-sm-right" src="{{ asset('assets/images/centang1.png')}}" height="30">
                                                                  </td>
                                <td width="15%"> T: 1M X 3M</td>
                            </tr>
                            <tr>
                                <!-- <th>Updated By</th> -->
                                <td>3 SIGNBOARD  BLOBBY VARIAN 2
                                    
                                        <img class="float-sm-right" src="{{ asset('assets/images/centang1.png')}}" height="30">
                                    
                                </td>
                                <td width="15%"> T: 1M X 3M</td>
                            </tr>
                            <tr>
                                <!-- <th>Updated By</th> -->
                                <td>4 SIGNBOARD  BLOBBY VARIAN 3
                                     
                                        <img class="float-sm-right" src="{{ asset('assets/images/centang1.png')}}" height="30">
                                                                   </td>
                                <td width="15%"> T: 1M X 3M</td>
                            </tr>
                            <tr>
                                <!-- <th>Updated By</th> -->
                                <td>5 SIGNBOARD  BLOBBY VARIAN 4
                                    
                                        <img class="float-sm-right" src="{{ asset('assets/images/centang1.png')}}" height="30">
                                                                  </td>
                                <td width="15%"> T: 1M X 3M</td>
                            </tr>
                            <tr>
                                <!-- <th>Updated By</th> -->
                                <td>6 SIGNBOARD  BLOBBY VARIAN 5
                                     
                                        <img class="float-sm-right" src="{{ asset('assets/images/centang1.png')}}" height="30">
                                                                  </td>
                                <td width="15%"> T: 1M X 3M</td>
                            </tr>
                            <tr>
                                <th>Design ini digunakan untuk signboard yang terpasang menggunakan tiang</th>
                                <td>STANDING SIGNBOARD 
                                
                                        <img class="float-sm-right" src="{{ asset('assets/images/centang1.png')}}" height="30">
                                                                   </td>
                                <td width="15%"> T: 1M X 3M</td>
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
                    
                </div>
                     
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
                                    <label class="label test-success">
                                        Menunggu Approval
                                    </label>
                                @elseif($approve == 1 )
                                    <label class="label test-success">
                                        Approved
                                    </label><br>
                                    {{ date('d-M-Y h:i:s', strtotime($tanggal_approve)) }}
                                @else
                                    <label class="label label-danger">
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

